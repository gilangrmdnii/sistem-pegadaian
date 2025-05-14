@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Edit Pengguna</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-5 max-w-xl">
        @csrf @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <select name="role_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-4">
            <x-primary-button>Update</x-primary-button>
            <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-600 hover:underline">Kembali</a>
        </div>
    </form>
@endsection
