<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PawnItemController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PawnTransactionController;
use App\Http\Controllers\Admin\PawnPaymentController;
use App\Http\Controllers\Admin\TransactionHistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// =====================
// ROUTE UNTUK USER BIASA
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =====================
// ROUTE UNTUK ADMIN (RBAC)
// =====================
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {

    // 1. Kelola Pengguna - hanya Super Admin
    Route::middleware('role:super_admin')->group(function () {
        Route::resource('users', UserController::class);
    });

    // 2. Manajemen Barang Gadai, Pelanggan, Transaksi Gadai - Super Admin & Petugas
    Route::middleware('role:super_admin|petugas|kasir|auditor|manajer')->group(function () {
        Route::resource('pawn-items', PawnItemController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('pawn-transactions', PawnTransactionController::class);
    });


    // 4. Input & Verifikasi Pembayaran - Super Admin & Kasir
    Route::middleware('role:super_admin|kasir')->group(function () {
        Route::resource('pawn-payments', PawnPaymentController::class)->only([
            'index', 'create', 'store', 'edit', 'update'
        ]);
    });

    // 5. Lihat Transaksi Cabang & Riwayat Transaksi
    Route::middleware('role:super_admin|manajer|auditor|kasir|petugas')->group(function () {
        Route::get('transaction-history', [TransactionHistoryController::class, 'index'])->name('transaction-history.index');
    });

});

require __DIR__ . '/auth.php';
