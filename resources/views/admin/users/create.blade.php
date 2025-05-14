@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Form Tambah Pengguna</h2>

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama <span class="text-red-500">*</span></label>
                <input type="text" name="name" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Role <span class="text-red-500">*</span></label>
                <select name="role_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="">-- Pilih Role --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end gap-4 pt-4 border-t mt-6">
                <a href="{{ route('admin.users.index') }}"
                   class="text-sm text-gray-600 hover:text-indigo-600 transition duration-150 ease-in-out">
                    Batal
                </a>

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md shadow transition duration-150 ease-in-out">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
