<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenPendaftar extends Model
{
    protected $table = 'dokumen_pendaftar';

    protected $fillable = [
        'pendaftar_id',
        'dokumen_persyaratan_id',
        'file_path',
        'file_original_name',
        'status',
        'catatan',
        'verified_by',
        'verified_at',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function dokumenPersyaratan()
    {
        return $this->belongsTo(DokumenPersyaratan::class);
    }

    public function verifikator()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
