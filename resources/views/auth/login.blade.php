<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-gray-900">Selamat Datang Kembali</h1>
        <p class="text-sm text-gray-600 mt-1">Silakan masuk untuk melanjutkan ke sistem penggadaian</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Masukkan email Anda"
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
                autocomplete="current-password"
                placeholder="Masukkan password Anda"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-2">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember"
                >
                <span class="ms-2 text-sm text-gray-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a
                    class="text-sm text-indigo-600 hover:underline"
                    href="{{ route('password.request') }}"
                >
                    Lupa password?
                </a>
            @endif
        </div>

        <div class="mt-4">
            <x-primary-button class="w-full justify-center">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
