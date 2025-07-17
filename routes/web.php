<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;

Route::resource('studios', StudioController::class);
Route::get('/studios/{studios}/confirmDelete', [App\Http\Controllers\StudioController::class, 'confirmDelete'])->name('studios.confirmDelete');

Route::resource('films', FilmController::class);
Route::get('/films/{films}/confirmDelete', [App\Http\Controllers\FilmController::class, 'confirmDelete'])->name('films.confirmDelete');

Route::resource('tikets', TiketController::class);
Route::get('/tikets/{tikets}/confirmDelete', [App\Http\Controllers\TiketController::class, 'confirmDelete'])->name('tikets.confirmDelete');

Route::resource('karyawans', KaryawanController::class);
Route::get('/karyawans/{karyawans}/confirmDelete', [App\Http\Controllers\KaryawanController::class, 'confirmDelete'])->name('karyawans.confirmDelete');

Route::resource('penggunas', PenggunaController::class);
Route::get('/penggunas/{penggunas}/confirmDelete', [App\Http\Controllers\PenggunaController::class, 'confirmDelete'])->name('penggunas.confirmDelete');

Route::resource('transaksis', TransaksiController::class);
Route::get('/transaksis/{transaksis}/confirmDelete', [App\Http\Controllers\TransaksiController::class, 'confirmDelete'])->name('transaksis.confirmDelete');

Route::get('/', [HomeController::class, 'index'])->name('home');

