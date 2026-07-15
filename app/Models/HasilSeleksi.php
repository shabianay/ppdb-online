<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilSeleksi extends Model
{
    protected $table = 'hasil_seleksi';

    protected $fillable = [
        'pendaftar_id',
        'jalur_pendaftaran_id',
        'status',
        'peringkat',
        'nilai_akhir',
        'keterangan',
        'diputuskan_oleh',
        'diputuskan_at',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function jalurPendaftaran()
    {
        return $this->belongsTo(JalurPendaftaran::class);
    }

    public function diputuskanOleh()
    {
        return $this->belongsTo(User::class, 'diputuskan_oleh');
    }
}
