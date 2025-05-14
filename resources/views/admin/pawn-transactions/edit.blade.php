@extends('layouts.admin')

@section('title', 'Edit Transaksi Gadai')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Edit Transaksi Gadai</h2>

    <form method="POST" action="{{ route('admin.pawn-transactions.update', $pawnTransaction->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pelanggan <span class="text-red-500">*</span></label>
            <select name="customer_id" id="customer_id" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('customer_id') border-red-500 @enderror">
                <option value="">Pilih Pelanggan</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id', $pawnTransaction->customer_id) == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Barang Gadai <span class="text-red-500">*</span></label>
            <select name="pawn_item_id" id="pawn_item_id" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('pawn_item_id') border-red-500 @enderror">
                <option value="">Pilih Barang Gadai</option>
                @foreach($pawnItems as $pawnItem)
                    <option value="{{ $pawnItem->id }}" {{ old('pawn_item_id', $pawnTransaction->pawn_item_id) == $pawnItem->id ? 'selected' : '' }}>{{ $pawnItem->item_name }}</option>
                @endforeach
            </select>
            @error('pawn_item_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Transaksi <span class="text-red-500">*</span></label>
            <input type="date" name="transaction_date" id="transaction_date" value="{{ old('transaction_date', $pawnTransaction->transaction_date) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('transaction_date') border-red-500 @enderror">
            @error('transaction_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Pinjaman <span class="text-red-500">*</span></label>
            <input type="number" name="loan_amount" id="loan_amount" value="{{ old('loan_amount', $pawnTransaction->loan_amount) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('loan_amount') border-red-500 @enderror">
            @error('loan_amount')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Suku Bunga (%) <span class="text-red-500">*</span></label>
            <input type="number" step="0.01" name="interest_rate" id="interest_rate" value="{{ old('interest_rate', $pawnTransaction->interest_rate) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('interest_rate') border-red-500 @enderror">
            @error('interest_rate')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Jatuh Tempo <span class="text-red-500">*</span></label>
            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $pawnTransaction->due_date) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('due_date') border-red-500 @enderror">
            @error('due_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end gap-4 pt-4 border-t mt-6">
            <a href="{{ route('admin.pawn-transactions.index') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition duration-150 ease-in-out">
                Kembali
            </a>

            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md shadow transition duration-150 ease-in-out">
                Perbarui Transaksi
            </button>
        </div>
    </form>
</div>
@endsection
