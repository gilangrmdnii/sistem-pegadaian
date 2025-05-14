@extends('layouts.admin')

@section('title', 'Riwayat Transaksi Gadai')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8 max-w-7xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Riwayat Transaksi Gadai</h2>

    <div class="mb-4 flex items-center justify-between">
        <form action="{{ route('admin.transaction-history.index') }}" method="GET" class="flex items-center gap-4">
            <input type="text" name="search" placeholder="Cari transaksi..." 
                class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md shadow">
                Cari
            </button>
        </form>
    </div>

    <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">ID Transaksi</th>
                <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Pelanggan</th>
                <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Barang Gadai</th>
                <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Tanggal Transaksi</th>
                <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Jumlah Pinjaman</th>
                <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td class="px-6 py-4 border-b text-sm text-gray-700">
                        <a href="{{ route('admin.pawn-transactions.show', $transaction->id) }}" class="text-indigo-600 hover:text-indigo-800">#{{ $transaction->id }}</a>
                    </td>
                    <td class="px-6 py-4 border-b text-sm text-gray-700">{{ $transaction->customer->name }}</td>
                    <td class="px-6 py-4 border-b text-sm text-gray-700">{{ $transaction->pawnItem->item_name }}</td>
                    <td class="px-6 py-4 border-b text-sm text-gray-700">{{ $transaction->transaction_date }}</td>
                    <td class="px-6 py-4 border-b text-sm text-gray-700">Rp{{ number_format($transaction->loan_amount, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 border-b text-sm text-gray-700">
                        @if($transaction->status == 'lunas')
                            Lunas
                        @elseif($transaction->status == 'jatuh tempo')
                            Jatuh Tempo
                        @else
                            Belum Lunas
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $transactions->links() }}
    </div>
</div>
@endsection
