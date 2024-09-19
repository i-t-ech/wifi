<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BundlesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\PaymentController;

// Welcome page route
Route::get('/', [PackageController::class, 'welcome'])->name('welcome');

// User dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin dashboard route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Authenticated user routes
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // MPesa routes
    Route::post('/stk-push', [MpesaController::class, 'stkPush'])->name('stk-push');
    Route::post('/api/mpesa-callback', [MpesaController::class, 'handleMpesaCallback'])->name('mpesa-callback');
    
    // Buy bundles route
    Route::get('/buy-bundles', [BundlesController::class, 'index'])->name('buy-bundles');

    // Claim failed transaction route
    Route::get('/claim-failed-transaction', [TransactionController::class, 'claim'])->name('claim-transaction');

    // Contact route
    Route::get('/contact', [SupportController::class, 'contact'])->name('contact');
});

// Package routes
Route::post('/package/{package}', [PackageController::class, 'buyPackage'])->name('package.buy');

// Payment routes
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment');

// Include authentication routes
require __DIR__.'/auth.php';
