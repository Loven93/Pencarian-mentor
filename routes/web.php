<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;

// Rute untuk Homepage
Route::get('/', [HomeController::class, 'index']);

// --- Rute-rute Mentor (Membutuhkan Login) ---
Route::middleware('auth')->group(function () {
    Route::get('/mentors', [MentorController::class, 'index'])->name('mentors.index');
    Route::get('/mentors/create', [MentorController::class, 'create'])->name('mentors.create');
    Route::post('/mentors', [MentorController::class, 'store'])->name('mentors.store');
    Route::get('/mentors/{mentor}', [MentorController::class, 'show'])->name('mentors.show');
    Route::get('/mentors/{mentor}/edit', [MentorController::class, 'edit'])->name('mentors.edit');
    
    // RUTE INILAH YANG PERLU ANDA TAMBAHKAN ATAU PASTIKAN ADA
    Route::put('/mentors/{mentor}', [MentorController::class, 'update'])->name('mentors.update');
});


// --- Rute untuk Booking & Payment (Membutuhkan Login) ---
Route::middleware('auth')->group(function () {
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::post('/bookings/{booking}/pay', [BookingController::class, 'processPayment'])->name('bookings.pay');
});


// --- Rute-rute Bawaan dari Breeze ---
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
