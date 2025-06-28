<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\HomeController;

// Rute untuk Homepage
Route::get('/', [HomeController::class, 'index']);

// Rute untuk menampilkan form tambah mentor (GET)
Route::get('/mentors/create', [MentorController::class, 'create']);

// TAMBAHKAN ROUTE BARU INI UNTUK MEMPROSES SIMPAN DATA (POST)
Route::post('/mentors', [MentorController::class, 'store']);

// Rute untuk menampilkan semua mentor (GET)
Route::get('/mentors', [MentorController::class, 'index']);

// Rute untuk menampilkan detail satu mentor (GET)
Route::get('/mentors/{mentor}', [MentorController::class, 'show']);
