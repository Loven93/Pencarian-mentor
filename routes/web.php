<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;

/* ... komentar bawaan Laravel ... */

// Rute untuk Halaman Utama (Homepage)
// Saat orang membuka http://pencarian-mentor.test/
Route::get('/', function () {
    return view('welcome'); // <-- Perintah ini akan menampilkan halaman "Selamat Datang"
});


// Rute untuk Halaman Daftar Mentor
// Saat orang membuka http://pencarian-mentor.test/mentors
Route::get('/mentors', [MentorController::class, 'index']);
