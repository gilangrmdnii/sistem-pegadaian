<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PawnItem;
use App\Models\Customer;
use App\Models\PawnTransaction;
use Illuminate\Http\Request;

class PawnItemController extends Controller
{
    public function index()
    {
        // Mengambil barang gadai tanpa melibatkan pelanggan langsung
        $items = PawnItem::latest()->get();
        return view('admin.pawn-items.index', compact('items'));
    }

    public function create()
    {
        // Menyediakan data pelanggan untuk transaksi
        $customers = Customer::all();
        return view('admin.pawn-items.create', compact('customers'));
    }

    public function store(Request $request)
    {
        // Validasi input untuk barang gadai
        $validated = $request->validate([
            'item_name' => 'required|string',
            'tracking_code' => 'required|string|unique:pawn_items',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:on_hold,diambil,ditebus',
        ]);

        // Menyimpan barang gadai baru
        $pawnItem = PawnItem::create([
            'item_name' => $validated['item_name'],
            'tracking_code' => $validated['tracking_code'],
            'description' => $validated['keterangan'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.pawn-items.index')->with('success', 'Barang gadai berhasil ditambahkan.');
    }

    public function destroy(PawnItem $pawnItem)
    {
        $pawnItem->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
