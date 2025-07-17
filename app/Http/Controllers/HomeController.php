<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Studio;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\Pengguna;
use App\Models\Karyawan;

class HomeController extends Controller
{
public function index()
{
    return view('home', [
        'totalFilms' => Film::count(),
        'totalStudios' => Studio::count(),
        'tiketTersedia' => Tiket::where('status', 'tersedia')->count(),
        'totalTransaksis' => Transaksi::count(),
        'totalPenggunas' => Pengguna::count(),
        'totalKaryawans' => Karyawan::count(),
    ]);
}
}
