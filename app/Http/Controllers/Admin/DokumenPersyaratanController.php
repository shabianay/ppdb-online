<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenPersyaratan;
use App\Models\JalurPendaftaran;
use Illuminate\Http\Request;

class DokumenPersyaratanController extends Controller
{
    public function index(Request $request)
    {
        $query = DokumenPersyaratan::with('jalurPendaftaran');

        if ($request->filled('jalur_pendaftaran_id')) {
            $query->where('jalur_pendaftaran_id', $request->jalur_pendaftaran_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }

        $dokumen = $query->latest()->get();
        $jalurList = JalurPendaftaran::where('aktif', true)->orderBy('nama')->get();
        return view('admin.dokumen-persyaratan.index', compact('dokumen', 'jalurList'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jalur_pendaftaran_id' => 'required|exists:jalur_pendaftaran,id',
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'format_file' => 'nullable|string|max:255',
            'max_size' => 'nullable|integer|min:0',
            'wajib' => 'boolean',
            'aktif' => 'boolean',
        ]);

        $validated['format_file'] = $validated['format_file'] ?? 'jpg,jpeg,png,pdf';
        $validated['max_size'] = $validated['max_size'] ?? 2048;

        DokumenPersyaratan::create($validated);

        return redirect()->route('admin.dokumen-persyaratan.index')->with('success', 'Dokumen persyaratan berhasil ditambahkan');
    }

    public function show(DokumenPersyaratan $dokumenPersyaratan)
    {
        //
    }

    public function edit(DokumenPersyaratan $dokumenPersyaratan)
    {
        //
    }

    public function update(Request $request, DokumenPersyaratan $dokumenPersyaratan)
    {
        $validated = $request->validate([
            'jalur_pendaftaran_id' => 'required|exists:jalur_pendaftaran,id',
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'format_file' => 'nullable|string|max:255',
            'max_size' => 'nullable|integer|min:0',
            'wajib' => 'boolean',
            'aktif' => 'boolean',
        ]);

        $dokumenPersyaratan->update($validated);

        return redirect()->route('admin.dokumen-persyaratan.index')->with('success', 'Dokumen persyaratan berhasil diperbarui');
    }

    public function destroy(DokumenPersyaratan $dokumenPersyaratan)
    {
        $dokumenPersyaratan->delete();
        return redirect()->route('admin.dokumen-persyaratan.index')->with('success', 'Dokumen persyaratan berhasil dihapus');
    }
}
