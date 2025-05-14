@extends('layouts.admin')

@section('title', 'Transaksi Gadai')

@section('content')
<a href="{{ route('admin.pawn-transactions.create') }}"
    class="inline-block bg-indigo-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-indigo-700 hover:shadow-lg transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 mb-4">
    + Tambah Transaksi
</a>

@if(session('success'))
<div class="mb-3 p-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="overflow-x-auto">
    <table class="table-auto w-full text-sm bg-white shadow-md rounded">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Pelanggan</th>
                <th class="px-4 py-2 border">Barang</th>
                <th class="px-4 py-2 border">Tanggal</th>
                <th class="px-4 py-2 border">Pinjaman</th>
                <th class="px-4 py-2 border">Suku Bunga</th>
                <th class="px-4 py-2 border">Jatuh Tempo</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border text-center">Aksi</th>
                <th class="px-4 py-2 border text-center">Bayar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $trx)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $trx->customer->name }}</td>
                <td class="border px-4 py-2">{{ $trx->pawnItem->item_name }}</td>
                <td class="border px-4 py-2">{{ $trx->transaction_date }}</td>
                <td class="border px-4 py-2">Rp{{ number_format($trx->loan_amount, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">{{ $trx->interest_rate }}%</td>
                <td class="border px-4 py-2">{{ $trx->due_date }}</td>
                <td class="border px-4 py-2">
                    @php
                    $status = $trx->status_label;
                    @endphp

                    @if($status == 'Lunas')
                    <span class="px-2 py-1 rounded text-xs font-medium bg-blue-100 text-blue-800">Lunas</span>
                    @elseif($status == 'Jatuh Tempo')
                    <span class="px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-800">Jatuh Tempo</span>
                    @else
                    <span class="px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Belum Lunas</span>
                    @endif
                </td>
                <td class="border px-4 py-2 text-center">
                    <a href="{{ route('admin.pawn-transactions.edit', $trx->id) }}" class="text-blue-600 hover:underline">Edit</a>
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.pawn-payments.create', ['transaction_id' => $trx->id]) }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm shadow">
                        Bayar
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center px-4 py-4 text-gray-500">
                    Tidak ada transaksi gadai.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination jika data banyak -->
<div class="mt-4">
    {{ $transactions->links() }}
</div>
@endsection