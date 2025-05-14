<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PawnTransaction;
use App\Models\Customer;
use App\Models\PawnItem;
use Illuminate\Http\Request;

class PawnTransactionController extends Controller
{
    public function index()
    {
        $transactions = PawnTransaction::with('customer', 'pawnItem')->paginate(10);
        return view('admin.pawn-transactions.index', compact('transactions'));
    }

    public function create()
    {
        $customers = Customer::all();
        $pawnItems = PawnItem::all();
        return view('admin.pawn-transactions.create', compact('customers', 'pawnItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'pawn_item_id' => 'required|exists:pawn_items,id',
            'transaction_date' => 'required|date',
            'loan_amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        PawnTransaction::create($request->all());

        return redirect()->route('admin.pawn-transactions.index')->with('success', 'Transaksi Gadai berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Ambil transaksi berdasarkan ID
        $trx = PawnTransaction::findOrFail($id);

        // Kirim transaksi ke view
        return view('admin.pawn-transactions.show', compact('trx'));
    }


    public function edit(PawnTransaction $pawnTransaction)
    {
        $customers = Customer::all();
        $pawnItems = PawnItem::all();
        return view('admin.pawn-transactions.edit', compact('pawnTransaction', 'customers', 'pawnItems'));
    }

    public function update(Request $request, PawnTransaction $pawnTransaction)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'pawn_item_id' => 'required|exists:pawn_items,id',
            'transaction_date' => 'required|date',
            'loan_amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        $pawnTransaction->update($request->all());

        return redirect()->route('admin.pawn-transactions.index')->with('success', 'Transaksi Gadai berhasil diperbarui.');
    }

    public function destroy(PawnTransaction $pawnTransaction)
    {
        $pawnTransaction->delete();
        return redirect()->route('admin.pawn-transactions.index')->with('success', 'Transaksi Gadai berhasil dihapus.');
    }
}
