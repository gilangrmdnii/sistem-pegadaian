@extends('layouts.admin')

@section('title', 'Daftar Barang Gadai')

@section('content')
<a href="{{ route('admin.pawn-items.create') }}"
    class="inline-block bg-indigo-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-indigo-700 hover:shadow-lg transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
    + Tambah Barang Gadai
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
                <th class="px-4 py-2 border">Nama Barang</th>
                <th class="px-4 py-2 border">Kode Tracking</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $index => $item)
            <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $item->item_name }}</td>
                <td class="border px-4 py-2">{{ $item->tracking_code }}</td>
                <td class="border px-4 py-2">
                    <span class="px-2 py-1 rounded text-xs font-medium {{ $item->status == 'on_hold' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td class="border px-4 py-2 text-center">
                    <a href="{{ route('admin.pawn-items.create') }}" class="text-blue-600 hover:underline">Tambah Transaksi</a>
                    <form action="{{ route('admin.pawn-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus barang ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center px-4 py-4 text-gray-500">
                    Tidak ada data barang gadai.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
