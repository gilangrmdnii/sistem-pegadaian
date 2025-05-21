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
    Route::middleware('role:super_admin|petugas|kasir|auditor')->group(function () {
        Route::resource('pawn-items', PawnItemController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('pawn-transactions', PawnTransactionController::class);
    });

    // 3. Read-only untuk Auditor
    // Route::middleware('role:auditor')->group(function () {
    //     Route::get('pawn-items', [PawnItemController::class, 'index'])->name('pawn-items.index');
    //     Route::get('pawn-items/{pawn_item}', [PawnItemController::class, 'show'])->name('pawn-items.show');
    //     Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    //     Route::get('customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    //     Route::get('pawn-transactions', [PawnTransactionController::class, 'index'])->name('pawn-transactions.index');
    //     Route::get('pawn-transactions/{pawn_transaction}', [PawnTransactionController::class, 'show'])->name('pawn-transactions.show');
    // });

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

    // // 6. Approve Transaksi Besar (bisa disesuaikan dengan logic terpisah di controller)
    // Route::middleware('role:super_admin|manajer')->group(function () {
    //     Route::post('pawn-transactions/{pawn_transaction}/approve', [PawnTransactionController::class, 'approve'])
    //         ->name('pawn-transactions.approve');
    // });

    // // 7. Akses Laporan & Statistik
    // Route::middleware('role:super_admin|manajer|auditor')->group(function () {
    //     // Gantilah controller di bawah ini dengan yang sesuai untuk laporan
    //     Route::get('reports', [TransactionHistoryController::class, 'reports'])->name('reports.index');
    // });

    // // 8. Monitoring Log & Aktivitas
    // Route::middleware('role:super_admin|auditor')->group(function () {
    //     // Gantilah controller di bawah ini dengan controller monitoring yang sesuai
    //     Route::get('activity-log', [TransactionHistoryController::class, 'log'])->name('activity-log.index');
    // });

});

require __DIR__ . '/auth.php';
