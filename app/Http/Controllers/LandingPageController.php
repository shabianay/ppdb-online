<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\JalurPendaftaran;

class LandingPageController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('dipublikasikan', true)
            ->where('tipe', 'pengumuman')
            ->latest()
            ->take(3)
            ->get();

        $jalur = JalurPendaftaran::where('aktif', true)->get();

        return view('landing.index', compact('pengumuman', 'jalur'));
    }

    public function info()
    {
        return view('landing.info');
    }

    public function jalur()
    {
        $jalur = JalurPendaftaran::where('aktif', true)->get();
        return view('landing.jalur', compact('jalur'));
    }

    public function faq()
    {
        return view('landing.faq');
    }

    public function kontak()
    {
        return view('landing.kontak');
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::where('dipublikasikan', true)
            ->latest()
            ->paginate(10);

        return view('landing.pengumuman', compact('pengumuman'));
    }

    public function pengumumanDetail($id)
    {
        $item = Pengumuman::findOrFail($id);
        return view('landing.pengumuman-detail', compact('item'));
    }
}
