<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use App\Models\DokumenPendaftar;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftar::with('user', 'jalurPendaftaran', 'gelombang')
            ->whereIn('status', ['menunggu_verifikasi', 'draft', 'diverifikasi', 'ditolak']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($q2) use ($search) {
                      $q2->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('jalur')) {
            $query->where('jalur_pendaftaran_id', $request->jalur);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('tanggal_awal')) {
            $query->whereDate('created_at', '>=', $request->tanggal_awal);
        }

        $pendaftar = $query->latest()->paginate(15)->withQueryString();

        return view('admin.verifikasi.index', compact('pendaftar'));
    }

    public function show(Pendaftar $pendaftar)
    {
        $pendaftar->load('user', 'jalurPendaftaran', 'gelombang', 'orangTua', 'dokumenPendaftar.dokumenPersyaratan', 'dokumenPendaftar.verifikator');
        return view('admin.verifikasi.show', compact('pendaftar'));
    }

    public function approve(Request $request, Pendaftar $pendaftar)
    {
        $pendaftar->update([
            'status' => 'diverifikasi',
            'catatan_verifikasi' => $request->catatan,
        ]);

        return redirect()->route('admin.verifikasi.index')->with('success', 'Pendaftar berhasil diverifikasi');
    }

    public function reject(Request $request, Pendaftar $pendaftar)
    {
        $pendaftar->update([
            'status' => 'ditolak',
            'catatan_verifikasi' => $request->catatan,
        ]);

        return redirect()->route('admin.verifikasi.index')->with('success', 'Pendaftar ditolak');
    }

    public function verifikasiDokumen(Request $request, DokumenPendaftar $dokumen)
    {
        $dokumen->update([
            'status' => $request->status,
            'catatan' => $request->catatan,
            'verified_by' => auth()->id(),
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Status dokumen diperbarui');
    }
}
