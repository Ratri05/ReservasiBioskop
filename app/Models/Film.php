<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'judul', 'jam_tayang', 'durasi', 'sutradara',
        'pemeran_utama', 'bahasa', 'tanggal_rilis'
    ];

    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
