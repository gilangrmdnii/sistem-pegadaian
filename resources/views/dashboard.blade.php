@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h2 class="text-2xl font-semibold mb-2">Selamat Datang 👋</h2>
    <p class="text-gray-700">Halo {{ Auth::user()->name }}, kamu berhasil login ke sistem manajemen penggadaian.</p>
</div>
@endsection