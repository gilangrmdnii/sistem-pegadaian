@extends('layouts.admin')

@section('title', 'Detail Transaksi Gadai')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Detail Transaksi Gadai</h2>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Pelanggan</label>
        <p class="text-gray-800">{{ $trx->customer->name }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Barang</label>
        <p class="text-gray-800">{{ $trx->pawnItem->item_name }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Transaksi</label>
        <p class="text-gray-800">{{ $trx->transaction_date }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Pinjaman</label>
        <p class="text-gray-800">Rp{{ number_format($trx->loan_amount, 0, ',', '.') }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Suku Bunga</label>
        <p class="text-gray-800">{{ $trx->interest_rate }}%</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Jatuh Tempo</label>
        <p class="text-gray-800">{{ $trx->due_date }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <p class="text-gray-800">
            @if($trx->status == 'lunas')
                Lunas
            @elseif($trx->status == 'jatuh tempo')
                Jatuh Tempo
            @else
                Belum Lunas
            @endif
        </p>
    </div>

    <div class="flex items-center justify-end gap-4 pt-4 border-t mt-6">
        <a href="{{ route('admin.pawn-transactions.index') }}"
            class="text-sm text-gray-600 hover:text-indigo-600 transition duration-150 ease-in-out">
            Kembali
        </a>
    </div>
</div>
@endsection
