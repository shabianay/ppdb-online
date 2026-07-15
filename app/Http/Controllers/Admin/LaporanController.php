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

        $pendaftar = $query->latest()->paginate(20);
        $totalPendaftar = Pendaftar::count();

        return view('admin.laporan.pendaftar', compact('pendaftar', 'totalPendaftar'));
    }

    public function keuangan()
    {
        $totalTagihan = Tagihan::sum('nominal');
        $totalPembayaran = Pembayaran::where('status', 'lunas')->sum('jumlah');
        $pembayaranPerMetode = Pembayaran::where('status', 'lunas')
            ->selectRaw('metode, sum(jumlah) as total')
            ->groupBy('metode')
            ->get();

        return view('admin.laporan.keuangan', compact('totalTagihan', 'totalPembayaran', 'pembayaranPerMetode'));
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
