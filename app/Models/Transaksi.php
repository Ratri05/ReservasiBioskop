<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'tanggal_transaksi', 'metode_pembayaran',
        'total_pembayaran', 'pengguna_id', 'tiket_id'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}
