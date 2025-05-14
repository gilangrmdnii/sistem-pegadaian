@extends('layouts.admin')

@section('title', 'Tambah Pembayaran Gadai')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Form Pembayaran Gadai</h2>

    <form action="{{ route('admin.pawn-payments.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="pawn_transaction_id" class="block text-sm font-medium text-gray-700 mb-1">Transaksi Gadai <span class="text-red-500">*</span></label>
            <select name="pawn_transaction_id" id="pawn_transaction_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                <option value="">Pilih Transaksi</option>
                @foreach($transactions as $transaction)
                    <option value="{{ $transaction->id }}" {{ old('pawn_transaction_id') == $transaction->id ? 'selected' : '' }}>
                        #{{ $transaction->id }} - {{ $transaction->customer->name }} - Rp{{ number_format($transaction->loan_amount, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            @error('pawn_transaction_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="payment_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pembayaran <span class="text-red-500">*</span></label>
            <input type="date" name="payment_date" id="payment_date" value="{{ old('payment_date') }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            @error('payment_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="amount_paid" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Dibayar <span class="text-red-500">*</span></label>
            <input type="number" step="0.01" name="amount_paid" id="amount_paid" value="{{ old('amount_paid') }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            @error('amount_paid')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end gap-4 pt-4 border-t mt-6">
            <a href="{{ route('admin.pawn-payments.index') }}"
                class="text-sm text-gray-600 hover:text-indigo-600 transition duration-150 ease-in-out">
                Kembali
            </a>

            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md shadow transition duration-150 ease-in-out">
                Simpan Pembayaran
            </button>
        </div>
    </form>
</div>
@endsection
