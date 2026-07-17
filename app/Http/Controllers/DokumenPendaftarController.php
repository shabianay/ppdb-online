<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\DokumenPersyaratan;
use App\Models\DokumenPendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenPendaftarController extends Controller
{
    public function upload(Request $request, Pendaftar $pendaftar)
    {
        if (auth()->user()->role !== 'admin' && $pendaftar->user_id !== auth()->id()) {
            abort(403);
        }

        $persyaratanId = $request->input('dokumen_persyaratan_id');
        $persyaratan = DokumenPersyaratan::findOrFail($persyaratanId);

        // Ambil rule validasi dari database
        $formats = $persyaratan->format_file ?? 'jpg,jpeg,png,pdf';
        $maxSize = $persyaratan->max_size ?? 2048; // Default 2MB

        $request->validate([
            'file' => "required|file|mimes:{$formats}|max:{$maxSize}",
            'dokumen_persyaratan_id' => 'required'
        ]);

        $file = $request->file('file');
        $path = $file->store('pendaftaran/' . $pendaftar->id, 'public');

        // Hapus dokumen lama jika ada
        $oldDoc = DokumenPendaftar::where('pendaftar_id', $pendaftar->id)
            ->where('dokumen_persyaratan_id', $persyaratanId)
            ->first();
        
        if ($oldDoc) {
            Storage::disk('public')->delete($oldDoc->file_path);
            $oldDoc->delete();
        }

        DokumenPendaftar::create([
            'pendaftar_id' => $pendaftar->id,
            'dokumen_persyaratan_id' => $persyaratanId,
            'file_path' => $path,
            'file_original_name' => $file->getClientOriginalName(),
            'status' => 'menunggu_verifikasi',
        ]);

        return back()->with('success', 'Dokumen ' . $persyaratan->nama . ' berhasil diunggah.');
    }
}
