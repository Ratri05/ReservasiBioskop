<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['nama', 'posisi', 'jadwal_kerja', 'no_telepon', 'alamat'];

    public function penggunas()
    {
        return $this->hasMany(Pengguna::class);
    }
}
