<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gelombang;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    public function index(Request $request)
    {
        $query = Gelombang::withCount('pendaftar');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%");
        }

        $gelombang = $query->latest()->get();
        return view('admin.gelombang.index', compact('gelombang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'aktif' => 'boolean',
        ]);

        Gelombang::create($validated);

        return redirect()->route('admin.gelombang.index')->with('success', 'Gelombang berhasil ditambahkan');
    }

    public function update(Request $request, Gelombang $gelombang)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'aktif' => 'boolean',
        ]);

        $gelombang->update($validated);

        return redirect()->route('admin.gelombang.index')->with('success', 'Gelombang berhasil diperbarui');
    }

    public function destroy(Gelombang $gelombang)
    {
        $gelombang->delete();
        return redirect()->route('admin.gelombang.index')->with('success', 'Gelombang berhasil dihapus');
    }
}
