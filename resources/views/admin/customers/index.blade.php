@extends('layouts.admin')

@section('title', 'Daftar Pelanggan')

@section('content')
    <!-- Form Pencarian -->
    <div class="mb-4 flex justify-between items-center">
        <div class="flex space-x-4">
            <!-- Tombol Tambah Pelanggan -->
            <a href="{{ route('admin.customers.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded inline-block">
                + Tambah Pelanggan
            </a>
        </div>

        <!-- Form Pencarian -->
        <form action="{{ route('admin.customers.index') }}" method="GET" class="flex space-x-2">
            <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Cari pelanggan..." class="border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Cari</button>
        </form>
    </div>

    @if(session('success'))
        <div class="mb-3 p-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table-auto w-full text-sm bg-white shadow-md rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Alamat</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">No HP</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $index => $customer)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $customer->name }}</td>
                        <td class="border px-4 py-2">{{ $customer->address }}</td>
                        <td class="border px-4 py-2">{{ $customer->email ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $customer->phone_number }}</td>
                        <td class="border px-4 py-2 flex gap-2 justify-center">
                            <a href="{{ route('admin.customers.edit', $customer->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center border px-4 py-2">Belum ada data pelanggan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
