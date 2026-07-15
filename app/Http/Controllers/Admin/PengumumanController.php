<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengumuman::with('user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
            });
        }

        $pengumuman = $query->latest()->paginate(15)->withQueryString();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'tipe' => 'required|in:info,pengumuman,artikel',
            'dipublikasikan' => 'boolean',
            'tanggal_terbit' => 'nullable|date',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['dipublikasikan'] = $request->boolean('dipublikasikan');

        Pengumuman::create($validated);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'tipe' => 'required|in:info,pengumuman,artikel',
            'dipublikasikan' => 'boolean',
            'tanggal_terbit' => 'nullable|date',
        ]);

        $validated['dipublikasikan'] = $request->boolean('dipublikasikan');

        $pengumuman->update($validated);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus');
    }
}
