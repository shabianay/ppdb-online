<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'tagihan_id',
        'kode_transaksi',
        'jumlah',
        'metode',
        'payment_gateway',
        'payment_gateway_ref',
        'bukti_bayar',
        'status',
        'verified_by',
        'verified_at',
    ];

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class);
    }

    public function verifikator()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
