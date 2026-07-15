<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilSeleksi;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class SeleksiController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftar::with('user', 'jalurPendaftaran', 'hasilSeleksi')
            ->where('status', 'diverifikasi')
            ->latest()
            ->paginate(20);

        return view('admin.seleksi.index', compact('pendaftar'));
    }

    public function umumkan(Request $request)
    {
        $validated = $request->validate([
            'pendaftar_id' => 'required|exists:pendaftar,id',
            'status' => 'required|in:diterima,ditolak,cadangan',
            'nilai_akhir' => 'nullable|numeric',
            'peringkat' => 'nullable|integer',
            'keterangan' => 'nullable|string',
        ]);

        HasilSeleksi::updateOrCreate(
            ['pendaftar_id' => $validated['pendaftar_id']],
            [
                'jalur_pendaftaran_id' => Pendaftar::find($validated['pendaftar_id'])->jalur_pendaftaran_id,
                'status' => $validated['status'],
                'nilai_akhir' => $validated['nilai_akhir'],
                'peringkat' => $validated['peringkat'],
                'keterangan' => $validated['keterangan'],
                'diputuskan_oleh' => auth()->id(),
                'diputuskan_at' => now(),
            ]
        );

        return redirect()->route('admin.seleksi.index')->with('success', 'Hasil seleksi berhasil diumumkan');
    }
}
