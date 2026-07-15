<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\JalurPendaftaran;
use App\Models\Gelombang;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $pendaftaran = Pendaftar::with(['user', 'jalurPendaftaran', 'gelombang'])->latest()->get();
        } else {
            $pendaftaran = Pendaftar::with(['jalurPendaftaran', 'gelombang'])->where('user_id', auth()->id())->latest()->get();
        }

        return view('pendaftaran.index', compact('pendaftaran'));
    }

    public function create()
    {
        $jalurPendaftaran = JalurPendaftaran::where('aktif', true)->get();
        $gelombang = Gelombang::where('aktif', true)->get();

        return view('pendaftaran.create', compact('jalurPendaftaran', 'gelombang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'     => 'required|string|max:255',
            'nisn'             => 'required|numeric|digits_between:10,12',
            'nik'              => 'required|string|digits:16',
            'tempat_lahir'     => 'required|string|max:255',
            'tanggal_lahir'    => 'required|date',
            'jenis_kelamin'    => 'required|in:L,P',
            'alamat'           => 'required|string',
            'asal_sekolah'     => 'required|string|max:255',
            'no_hp'            => 'required|string|max:20',
            'jalur_pendaftaran_id' => 'required|exists:jalur_pendaftaran,id',
            'gelombang_id'     => 'required|exists:gelombang,id',
            'ayah_nama'        => 'required|string|max:255',
            'ayah_pekerjaan'   => 'required|string|max:255',
            'ayah_penghasilan' => 'required|string|max:255',
            'ayah_no_hp'       => 'required|string|max:20',
            'ibu_nama'         => 'required|string|max:255',
            'ibu_pekerjaan'    => 'required|string|max:255',
            'ibu_penghasilan'  => 'required|string|max:255',
            'ibu_no_hp'        => 'required|string|max:20',
        ]);

        $pendaftar = Pendaftar::create([
            'user_id'              => auth()->id(),
            'jalur_pendaftaran_id' => $validated['jalur_pendaftaran_id'],
            'gelombang_id'         => $validated['gelombang_id'],
            'nisn'                 => $validated['nisn'],
            'nik'                  => $validated['nik'],
            'nama_lengkap'         => $validated['nama_lengkap'],
            'tempat_lahir'         => $validated['tempat_lahir'],
            'tanggal_lahir'        => $validated['tanggal_lahir'],
            'jenis_kelamin'        => $validated['jenis_kelamin'],
            'alamat'               => $validated['alamat'],
            'asal_sekolah'         => $validated['asal_sekolah'],
            'no_hp'                => $validated['no_hp'],
            'status'               => 'draft',
        ]);

        OrangTua::create([
            'pendaftar_id' => $pendaftar->id,
            'jenis'        => 'ayah',
            'nama'         => $validated['ayah_nama'],
            'pekerjaan'    => $validated['ayah_pekerjaan'],
            'penghasilan'  => $validated['ayah_penghasilan'],
            'no_hp'        => $validated['ayah_no_hp'],
        ]);

        OrangTua::create([
            'pendaftar_id' => $pendaftar->id,
            'jenis'        => 'ibu',
            'nama'         => $validated['ibu_nama'],
            'pekerjaan'    => $validated['ibu_pekerjaan'],
            'penghasilan'  => $validated['ibu_penghasilan'],
            'no_hp'        => $validated['ibu_no_hp'],
        ]);

        return redirect()->route('pendaftaran.show', $pendaftar)
            ->with('success', 'Pendaftaran berhasil dibuat.');
    }

    public function show(Pendaftar $pendaftar)
    {
        if (auth()->user()->role !== 'admin' && $pendaftar->user_id !== auth()->id()) {
            abort(403);
        }

        $pendaftar->load(['user', 'jalurPendaftaran', 'gelombang', 'orangTua', 'dokumenPendaftar', 'tagihan']);

        return view('pendaftaran.show', compact('pendaftar'));
    }

    public function edit(Pendaftar $pendaftar)
    {
        if (auth()->user()->role !== 'admin' && $pendaftar->user_id !== auth()->id()) {
            abort(403);
        }

        if ($pendaftar->status !== 'draft') {
            return redirect()->route('pendaftaran.show', $pendaftar)
                ->with('error', 'Pendaftaran dengan status "' . $pendaftar->status . '" tidak dapat diedit.');
        }

        $jalurPendaftaran = JalurPendaftaran::where('aktif', true)->get();
        $gelombang = Gelombang::where('aktif', true)->get();

        $ayah = $pendaftar->orangTua->where('jenis', 'ayah')->first();
        $ibu = $pendaftar->orangTua->where('jenis', 'ibu')->first();

        return view('pendaftaran.edit', compact('pendaftar', 'jalurPendaftaran', 'gelombang', 'ayah', 'ibu'));
    }

    public function update(Request $request, Pendaftar $pendaftar)
    {
        if (auth()->user()->role !== 'admin' && $pendaftar->user_id !== auth()->id()) {
            abort(403);
        }

        if ($pendaftar->status !== 'draft') {
            return redirect()->route('pendaftaran.show', $pendaftar)
                ->with('error', 'Pendaftaran dengan status "' . $pendaftar->status . '" tidak dapat diedit.');
        }

        $validated = $request->validate([
            'nama_lengkap'     => 'required|string|max:255',
            'nisn'             => 'required|numeric|digits_between:10,12',
            'nik'              => 'required|string|digits:16',
            'tempat_lahir'     => 'required|string|max:255',
            'tanggal_lahir'    => 'required|date',
            'jenis_kelamin'    => 'required|in:L,P',
            'alamat'           => 'required|string',
            'asal_sekolah'     => 'required|string|max:255',
            'no_hp'            => 'required|string|max:20',
            'jalur_pendaftaran_id' => 'required|exists:jalur_pendaftaran,id',
            'gelombang_id'     => 'required|exists:gelombang,id',
            'ayah_nama'        => 'required|string|max:255',
            'ayah_pekerjaan'   => 'required|string|max:255',
            'ayah_penghasilan' => 'required|string|max:255',
            'ayah_no_hp'       => 'required|string|max:20',
            'ibu_nama'         => 'required|string|max:255',
            'ibu_pekerjaan'    => 'required|string|max:255',
            'ibu_penghasilan'  => 'required|string|max:255',
            'ibu_no_hp'        => 'required|string|max:20',
        ]);

        $pendaftar->update([
            'jalur_pendaftaran_id' => $validated['jalur_pendaftaran_id'],
            'gelombang_id'         => $validated['gelombang_id'],
            'nisn'                 => $validated['nisn'],
            'nik'                  => $validated['nik'],
            'nama_lengkap'         => $validated['nama_lengkap'],
            'tempat_lahir'         => $validated['tempat_lahir'],
            'tanggal_lahir'        => $validated['tanggal_lahir'],
            'jenis_kelamin'        => $validated['jenis_kelamin'],
            'alamat'               => $validated['alamat'],
            'asal_sekolah'         => $validated['asal_sekolah'],
            'no_hp'                => $validated['no_hp'],
        ]);

        OrangTua::where('pendaftar_id', $pendaftar->id)->where('jenis', 'ayah')->update([
            'nama'        => $validated['ayah_nama'],
            'pekerjaan'   => $validated['ayah_pekerjaan'],
            'penghasilan' => $validated['ayah_penghasilan'],
            'no_hp'       => $validated['ayah_no_hp'],
        ]);

        OrangTua::where('pendaftar_id', $pendaftar->id)->where('jenis', 'ibu')->update([
            'nama'        => $validated['ibu_nama'],
            'pekerjaan'   => $validated['ibu_pekerjaan'],
            'penghasilan' => $validated['ibu_penghasilan'],
            'no_hp'       => $validated['ibu_no_hp'],
        ]);

        return redirect()->route('pendaftaran.show', $pendaftar)
            ->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function downloadPdf(Pendaftar $pendaftar)
    {
        if (auth()->user()->role !== 'admin' && $pendaftar->user_id !== auth()->id()) {
            abort(403);
        }

        $pendaftar->load('user', 'jalurPendaftaran', 'gelombang', 'orangTua', 'dokumenPendaftar.dokumenPersyaratan');

        $pdf = Pdf::loadView('pendaftaran.pdf', compact('pendaftar'));
        return $pdf->download('Kartu-Pendaftaran-' . $pendaftar->nama_lengkap . '.pdf');
    }
}
