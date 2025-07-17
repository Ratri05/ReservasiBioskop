<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
   protected $fillable = [
    'harga',
    'film_id',
    'studio_id',       // ← pastikan ini ada
    'nomor_kursi',
    'jam_tayang',
    'status',
];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function studio()
    {
        return $this->hasOne(Studio::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
