<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'konten',
        'gambar',
        'tipe',
        'dipublikasikan',
        'tanggal_terbit',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
