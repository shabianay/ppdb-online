<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';

    protected $fillable = [
        'user_id',
        'jalur_pendaftaran_id',
        'gelombang_id',
        'nisn',
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'asal_sekolah',
        'no_hp',
        'status',
        'catatan_verifikasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jalurPendaftaran()
    {
        return $this->belongsTo(JalurPendaftaran::class);
    }

    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class);
    }

    public function orangTua()
    {
        return $this->hasMany(OrangTua::class);
    }

    public function dokumenPendaftar()
    {
        return $this->hasMany(DokumenPendaftar::class);
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }

    public function hasilSeleksi()
    {
        return $this->hasOne(HasilSeleksi::class);
    }
}
