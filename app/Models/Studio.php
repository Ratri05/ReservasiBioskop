<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $fillable = ['nomor_studio', 'kapasitas', 'tipe_studio', 'tiket_id'];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}