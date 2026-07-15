<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    protected $table = 'gelombang';

    protected $fillable = [
        'nama',
        'tanggal_mulai',
        'tanggal_selesai',
        'aktif',
    ];

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class);
    }
}
