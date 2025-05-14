<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-gray-900">Buat Akun Baru</h1>
        <p class="text-sm text-gray-600 mt-1">Daftar sekarang untuk menggunakan Sistem Penggadaian</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Nama lengkap Anda"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                placeholder="Alamat email aktif"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Password minimal 8 karakter"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4" >
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Ulangi password Anda"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Action -->
        <div class="mt-2">
            <p class="text-sm text-gray-600 text-center mb-3">
                Sudah punya akun?
                <a class="text-indigo-600 hover:underline font-medium" href="{{ route('login') }}">
                    Masuk di sini
                </a>
            </p>

            <x-primary-button class="w-full justify-center mt-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
