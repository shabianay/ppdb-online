<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenPersyaratan extends Model
{
    protected $table = 'dokumen_persyaratan';

    protected $fillable = [
        'jalur_pendaftaran_id',
        'nama',
        'keterangan',
        'wajib',
        'format_file',
        'max_size',
        'aktif',
    ];

    public function jalurPendaftaran()
    {
        return $this->belongsTo(JalurPendaftaran::class);
    }

    public function dokumenPendaftar()
    {
        return $this->hasMany(DokumenPendaftar::class);
    }
}
