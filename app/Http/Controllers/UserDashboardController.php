<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Tagihan;
use App\Models\DokumenPendaftar;
use App\Models\DokumenPersyaratan;
use App\Models\Pengumuman;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (in_array($user->role, ['admin', 'panitia', 'bendahara', 'kepala_sekolah', 'super_admin'])) {
            return redirect()->route('admin.dashboard');
        }
        $pendaftar = $user->pendaftar;

        $tagihan = collect();
        $dokumen = collect();
        $persyaratan = collect();

        if ($pendaftar) {
            $tagihan = Tagihan::where('pendaftar_id', $pendaftar->id)
                ->with(['pembayaran'])
                ->orderBy('created_at')
                ->get();

            $dokumen = DokumenPendaftar::where('pendaftar_id', $pendaftar->id)
                ->with('dokumenPersyaratan')
                ->get();

            $persyaratan = DokumenPersyaratan::where('aktif', true)
                ->where('jalur_pendaftaran_id', $pendaftar->jalur_pendaftaran_id)
                ->get();
        }

        $pengumuman = Pengumuman::where('dipublikasikan', true)
            ->where('tanggal_terbit', '<=', now())
            ->latest('tanggal_terbit')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'pendaftar',
            'tagihan',
            'dokumen',
            'persyaratan',
            'pengumuman'
        ));
    }
}