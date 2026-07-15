<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'pendaftaran_mulai' => 'nullable|date',
            'pendaftaran_selesai' => 'nullable|date|after_or_equal:pendaftaran_mulai',
            'seleksi_mulai' => 'nullable|date',
            'seleksi_selesai' => 'nullable|date|after_or_equal:seleksi_mulai',
            'ppdb_aktif' => 'nullable|in:0,1',
        ]);

        Setting::setValue('pendaftaran_mulai', $request->pendaftaran_mulai);
        Setting::setValue('pendaftaran_selesai', $request->pendaftaran_selesai);
        Setting::setValue('seleksi_mulai', $request->seleksi_mulai);
        Setting::setValue('seleksi_selesai', $request->seleksi_selesai);
        Setting::setValue('ppdb_aktif', $request->ppdb_aktif ?? '0');

        return redirect()->route('admin.settings.index')
            ->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
