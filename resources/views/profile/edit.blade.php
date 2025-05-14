@extends('layouts.admin')

@section('title', 'Profil Saya')

@section('content')
    <div class="space-y-6">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Informasi Profil</h2>
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Perbarui Password</h2>
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4 text-red-600">Hapus Akun</h2>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
