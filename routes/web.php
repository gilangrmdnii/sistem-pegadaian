<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PawnItemController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PawnTransactionController;
use App\Http\Controllers\Admin\PawnPaymentController;
use App\Http\Controllers\Admin\TransactionHistoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk user biasa
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('pawn-items', PawnItemController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('pawn-transactions', PawnTransactionController::class);
    Route::resource('pawn-payments', PawnPaymentController::class);
    Route::get('transaction-history', [TransactionHistoryController::class, 'index'])->name('transaction-history.index');
});

require __DIR__ . '/auth.php';
