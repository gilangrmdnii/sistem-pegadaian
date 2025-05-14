@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content')
    <a href="{{ route('admin.users.create') }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded mb-4 inline-block">
        + Tambah Pengguna
    </a>

    @if(session('success'))
        <div class="mb-3 p-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white shadow-md rounded text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Role</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="text-center">
                        <td class="px-4 py-2 border">{{ $user->name }}</td>
                        <td class="px-4 py-2 border">{{ $user->email }}</td>
                        <td class="px-4 py-2 border">{{ $user->role->name }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                            |
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline" onclick="return confirm('Yakin hapus user ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
