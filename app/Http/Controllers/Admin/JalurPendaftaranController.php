<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JalurPendaftaran;
use Illuminate\Http\Request;

class JalurPendaftaranController extends Controller
{
    public function index()
    {
        $jalur = JalurPendaftaran::withCount('pendaftar')->latest()->get();
        return view('admin.jalur.index', compact('jalur'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:jalur_pendaftaran',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kuota' => 'required|integer|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'aktif' => 'boolean',
        ]);

        JalurPendaftaran::create($validated);

        return redirect()->route('admin.jalur-pendaftaran.index')->with('success', 'Jalur pendaftaran berhasil ditambahkan');
    }

    public function show(JalurPendaftaran $jalurPendaftaran)
    {
        //
    }

    public function edit(JalurPendaftaran $jalurPendaftaran)
    {
        //
    }

    public function update(Request $request, JalurPendaftaran $jalurPendaftaran)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:jalur_pendaftaran,kode,' . $jalurPendaftaran->id,
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kuota' => 'required|integer|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'aktif' => 'boolean',
        ]);

        $jalurPendaftaran->update($validated);

        return redirect()->route('admin.jalur-pendaftaran.index')->with('success', 'Jalur pendaftaran berhasil diperbarui');
    }

    public function destroy(JalurPendaftaran $jalurPendaftaran)
    {
        $jalurPendaftaran->delete();
        return redirect()->route('admin.jalur-pendaftaran.index')->with('success', 'Jalur pendaftaran berhasil dihapus');
    }
}
