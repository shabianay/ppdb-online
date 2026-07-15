<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagihanController extends Controller
{
    public function index()
    {
        $pendaftar = auth()->user()->pendaftar;
        $tagihan = collect();
        if ($pendaftar) {
            $tagihan = Tagihan::with('pembayaran')
                ->where('pendaftar_id', $pendaftar->id)
                ->latest()
                ->get();
        }

        return view('tagihan.index', compact('tagihan'));
    }

    public function show(Tagihan $tagihan)
    {
        if ($tagihan->pendaftar->user_id !== auth()->id()) {
            abort(403);
        }

        $tagihan->load('pembayaran', 'pendaftar');
        return view('tagihan.show', compact('tagihan'));
    }

    public function uploadBukti(Request $request, Tagihan $tagihan)
    {
        if ($tagihan->pendaftar->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'bukti_bayar' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $path = $request->file('bukti_bayar')->store('bukti-bayar', 'public');

        Pembayaran::create([
            'tagihan_id' => $tagihan->id,
            'kode_transaksi' => 'TRX-' . Str::random(12),
            'jumlah' => $tagihan->nominal,
            'metode' => 'transfer_manual',
            'bukti_bayar' => $path,
            'status' => 'menunggu_konfirmasi',
        ]);

        return redirect()->route('tagihan.show', $tagihan)->with('success', 'Bukti bayar berhasil diupload, menunggu verifikasi');
    }
}
