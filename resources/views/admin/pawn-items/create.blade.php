@extends('layouts.admin')

@section('title', 'Tambah Barang Gadai')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Form Tambah Barang Gadai</h2>

    <form method="POST" action="{{ route('admin.pawn-items.store') }}">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Barang <span class="text-red-500">*</span></label>
            <input type="text" name="item_name" value="{{ old('item_name') }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            @error('item_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kode Pelacakan <span class="text-red-500">*</span></label>
            <input type="text" name="tracking_code" value="{{ old('tracking_code') }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            @error('tracking_code')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="keterangan" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">{{ old('keterangan') }}</textarea>
            @error('keterangan')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
            <select name="status" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                <option value="on_hold" {{ old('status') == 'on_hold' ? 'selected' : '' }}>On Hold</option>
                <option value="diambil" {{ old('status') == 'diambil' ? 'selected' : '' }}>Diambil</option>
                <option value="ditebus" {{ old('status') == 'ditebus' ? 'selected' : '' }}>Ditebus</option>
            </select>
            @error('status')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end gap-4 pt-4 border-t mt-6">
            <a href="{{ route('admin.pawn-items.index') }}"
                class="text-sm text-gray-600 hover:text-indigo-600 transition duration-150 ease-in-out">
                Kembali
            </a>

            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md shadow transition duration-150 ease-in-out">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection