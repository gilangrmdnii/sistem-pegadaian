<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PawnPayment;
use App\Models\PawnTransaction;

class PawnPaymentController extends Controller
{
    /**
     * Menyimpan data pembayaran baru.
     */


    public function create()
    {
        // Ambil transaksi yang belum lunas
        $transactions = PawnTransaction::where('status', '!=', 'lunas')->get();

        // Mengirim data transaksi ke view
        return view('admin.pawn-payments.create', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pawn_transaction_id' => 'required|exists:pawn_transactions,id',
            'payment_date' => 'required|date',
            'amount_paid' => 'required|numeric|min:1',
        ]);

        // Ambil transaksi terkait
        $transaction = PawnTransaction::findOrFail($request->pawn_transaction_id);

        // Hitung total pembayaran sebelumnya
        $totalPaid = PawnPayment::where('pawn_transaction_id', $transaction->id)->sum('amount_paid');

        // Hitung total pinjaman + bunga
        $interestAmount = $transaction->loan_amount * ($transaction->interest_rate / 100);
        $totalWithInterest = $transaction->loan_amount + $interestAmount;

        // Tambahkan pembayaran baru
        $payment = PawnPayment::create([
            'pawn_transaction_id' => $transaction->id,
            'payment_date' => $request->payment_date,
            'amount_paid' => $request->amount_paid,
        ]);

        // Hitung ulang total yang sudah dibayar setelah pembayaran ini
        $newTotalPaid = $totalPaid + $request->amount_paid;

        // Jika lunas, update status transaksi
        if ($newTotalPaid >= $totalWithInterest) {
            $transaction->status = 'lunas'; // pastikan kolom 'status' ada di tabel transaksi
            $transaction->save();
        }

        return redirect()
            ->route('admin.pawn-transactions.show', $transaction->id)
            ->with('success', 'Pembayaran berhasil dicatat.');
    }
}
