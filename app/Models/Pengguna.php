<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $fillable = ['nama', 'no_telepon', 'email', 'karyawan_id'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
