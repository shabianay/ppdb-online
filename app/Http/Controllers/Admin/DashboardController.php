<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use App\Models\Pembayaran;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPendaftar = Pendaftar::count();
        $pendingVerifikasi = Pendaftar::where('status', 'menunggu_verifikasi')->count();
        $totalPembayaran = Pembayaran::where('status', 'lunas')->sum('jumlah');
        $totalUser = User::count();
        $recentPendaftar = Pendaftar::with('user', 'jalurPendaftaran', 'gelombang')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalPendaftar',
            'pendingVerifikasi',
            'totalPembayaran',
            'totalUser',
            'recentPendaftar'
        ));
    }
}
