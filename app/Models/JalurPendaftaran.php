<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JalurPendaftaran extends Model
{
    protected $table = 'jalur_pendaftaran';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'kuota',
        'tanggal_mulai',
        'tanggal_selesai',
        'aktif',
    ];

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class);
    }

    public function dokumenPersyaratan()
    {
        return $this->hasMany(DokumenPersyaratan::class);
    }

    public function hasilSeleksi()
    {
        return $this->hasMany(HasilSeleksi::class);
    }
}
