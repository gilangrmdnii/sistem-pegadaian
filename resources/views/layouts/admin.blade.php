<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r shadow-lg flex-shrink-0 transition-transform duration-300 transform ease-in-out p-4">
            <div class="p-6 border-b text-center">
                <h1 class="text-2xl font-extrabold text-indigo-600">PENGGADAIAN</h1>
                <p class="text-sm text-gray-500">Admin Panel</p>
            </div>
            <nav class="mt-4 px-4 space-y-4">

                <a href="{{ route('dashboard') }}"
                    class="flex items-center space-x-4 py-4 px-6 rounded-lg text-gray-700 hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white font-semibold' : '' }}">
                    <span><i class="fas fa-tachometer-alt text-lg mr-3"></i></span>
                    <span class="ml-4">Dashboard</span>
                </a>

                @if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('petugas') || Auth::user()->hasRole('manajer'))
                <a href="{{ route('admin.pawn-items.index') }}"
                    class="flex items-center py-4 px-6 rounded-lg text-gray-700 hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out {{ request()->routeIs('admin.pawn-items.*') ? 'bg-indigo-600 text-white font-semibold' : '' }}">
                    <span class="flex-shrink-0 w-6 text-center">
                        <i class="fas fa-box text-lg"></i>
                    </span>
                    <span class="ml-4">Barang Gadai</span>
                </a>
                @endif

                @if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('petugas') || Auth::user()->hasRole('auditor') || Auth::user()->hasRole('manajer') || Auth::user()->hasRole('kasir'))
                <a href="{{ route('admin.pawn-transactions.index') }}"
                    class="flex items-center py-4 px-6 rounded-lg text-gray-700 hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out {{ request()->routeIs('admin.pawn-transactions.*') ? 'bg-indigo-600 text-white font-semibold' : '' }}">
                    <span class="flex-shrink-0 w-6 text-center">
                        <i class="fas fa-exchange text-lg"></i>
                    </span>
                    <span class="ml-4">Transaksi Gadai</span>
                </a>

                <a href="{{ route('admin.transaction-history.index') }}"
                    class="flex items-center py-4 px-6 rounded-lg text-gray-700 hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out {{ request()->routeIs('admin.transaction-history.*') ? 'bg-indigo-600 text-white font-semibold' : '' }}">
                    <span class="flex-shrink-0 w-6 text-center">
                        <i class="fas fa-history text-lg"></i>
                    </span>
                    <span class="ml-4">Transaksi History</span>
                </a>
                @endif

                @if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('petugas'))
                <a href="{{ route('admin.customers.index') }}"
                    class="flex items-center space-x-4 py-4 px-6 rounded-lg text-gray-700 hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out {{ request()->routeIs('admin.customers.*') ? 'bg-indigo-600 text-white font-semibold' : '' }}">
                    <span><i class="fas fa-users text-lg"></i></span>
                    <span class="ml-4">Pelanggan</span>
                </a>
                @endif

                @if(Auth::user()->hasRole('super_admin'))
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center space-x-4 py-4 px-6 rounded-lg text-gray-700 hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out {{ request()->routeIs('admin.users.*') ? 'bg-indigo-600 text-white font-semibold' : '' }}">
                    <span><i class="fas fa-user-cog text-lg"></i></span>
                    <span class="ml-4">Manajemen Pengguna</span>
                </a>
                @endif

                <a href="{{ route('profile.edit') }}"
                    class="flex items-center space-x-4 py-4 px-6 rounded-lg text-gray-700 hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out {{ request()->routeIs('profile.edit') ? 'bg-indigo-600 text-white font-semibold' : '' }}">
                    <span><i class="fas fa-user-circle text-lg"></i></span>
                    <span class="ml-4">Profil Saya</span>
                </a>
            </nav>
        </aside>


        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Topbar -->
            <header class="bg-white border-b px-6 py-4 flex justify-between items-center shadow-md">
                <h1 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <div class="text-sm font-semibold text-gray-700">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded transition">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 space-y-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>