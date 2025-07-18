<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Landing page (home)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Resource routes
    Route::resource('studios', StudioController::class);
    Route::get('/studios/{studio}/confirmDelete', [StudioController::class, 'confirmDelete'])->name('studios.confirmDelete');

    Route::resource('films', FilmController::class);
    Route::get('/films/{film}/confirmDelete', [FilmController::class, 'confirmDelete'])->name('films.confirmDelete');

    Route::resource('tikets', TiketController::class);
    Route::get('/tikets/{tiket}/confirmDelete', [TiketController::class, 'confirmDelete'])->name('tikets.confirmDelete');

    Route::resource('karyawans', KaryawanController::class);
    Route::get('/karyawans/{karyawan}/confirmDelete', [KaryawanController::class, 'confirmDelete'])->name('karyawans.confirmDelete');

    Route::resource('penggunas', PenggunaController::class);
    Route::get('/penggunas/{pengguna}/confirmDelete', [PenggunaController::class, 'confirmDelete'])->name('penggunas.confirmDelete');

    Route::resource('transaksis', TransaksiController::class);
    Route::get('/transaksis/{transaksi}/confirmDelete', [TransaksiController::class, 'confirmDelete'])->name('transaksis.confirmDelete');
});
