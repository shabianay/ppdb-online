<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function pendaftar(Request $request)
    {
        $query = Pendaftar::with('user', 'jalurPendaftaran', 'gelombang');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%");
            });
        }
        if ($request->filled('jalur')) {
            $query->where('jalur_pendaftaran_id', $request->jalur);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $pendaftar = $query->latest()->paginate(20)->withQueryString();
        $totalPendaftar = Pendaftar::count();

        return view('admin.laporan.pendaftar', compact('pendaftar', 'totalPendaftar'));
    }

    public function keuangan()
    {
        $totalTagihan = Tagihan::sum('nominal');
        $totalPembayaran = Pembayaran::where('status', 'lunas')->sum('jumlah');
        $totalPendapatan = $totalPembayaran;
        $totalTransaksi = Pembayaran::where('status', 'lunas')->count();
        $totalPendaftarBayar = Pembayaran::where('pembayaran.status', 'lunas')
            ->join('tagihan', 'pembayaran.tagihan_id', '=', 'tagihan.id')
            ->distinct('tagihan.pendaftar_id')
            ->count('tagihan.pendaftar_id');
        $pembayaranPerMetode = Pembayaran::where('status', 'lunas')
            ->selectRaw('metode, sum(jumlah) as total')
            ->groupBy('metode')
            ->get();

        $pendapatanPerJalur = Pembayaran::where('pembayaran.status', 'lunas')
            ->join('tagihan', 'pembayaran.tagihan_id', '=', 'tagihan.id')
            ->join('pendaftar', 'tagihan.pendaftar_id', '=', 'pendaftar.id')
            ->join('jalur_pendaftaran', 'pendaftar.jalur_pendaftaran_id', '=', 'jalur_pendaftaran.id')
            ->selectRaw('jalur_pendaftaran.nama, count(distinct pendaftar.id) as jumlah_pendaftar, count(pembayaran.id) as jumlah_pembayaran, sum(pembayaran.jumlah) as total_nominal')
            ->groupBy('jalur_pendaftaran.nama')
            ->get();

        $transaksiTerbaru = Pembayaran::with(['tagihan.pendaftar'])
            ->where('status', 'lunas')
            ->latest()
            ->take(10)
            ->get();

        $jalurList = \App\Models\JalurPendaftaran::orderBy('nama')->get();

        return view('admin.laporan.keuangan', compact(
            'totalTagihan',
            'totalPembayaran',
            'totalPendapatan',
            'totalTransaksi',
            'totalPendaftarBayar',
            'pembayaranPerMetode',
            'pendapatanPerJalur',
            'transaksiTerbaru',
            'jalurList'
        ));
    }

    public function exportExcel()
    {
        return redirect()->back()->with('info', 'Fitur export Excel akan segera tersedia');
    }

    public function exportPdf()
    {
        return redirect()->back()->with('info', 'Fitur export PDF akan segera tersedia');
    }
}
