@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
<div class="container">
    <h1>Edit Pelanggan</h1>

    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" class="form-control" value="{{ $customer->address }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email (Opsional)</label>
            <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">No HP</label>
            <input type="text" name="phone_number" class="form-control" value="{{ $customer->phone_number }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
