@extends('admin.layouts.app')

@section('title', 'Pengumuman')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">Pengumuman</h1>
        <p class="text-muted-foreground mt-1 text-sm">Kelola pengumuman dan informasi PPDB.</p>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <span class="text-sm text-muted-foreground">Total: <strong class="text-foreground">{{ count($pengumuman ?? []) }}</strong></span>
        <button @@click="$dispatch('open-modal', 'createPengumuman')" class="px-5 py-2.5 bg-primary text-primary-foreground rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Buat Pengumuman
        </button>
    </div>

    <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" role="table" aria-label="Daftar pengumuman">
                <thead>
                    <tr class="border-b border-border bg-muted/30">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Judul</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden md:table-cell">Tipe</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden lg:table-cell">Tanggal</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-center text-xs font-semibold text-muted-foreground uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($pengumuman ?? [] as $p)
                        <tr class="hover:bg-muted/30 transition-colors">
                            <td class="px-5 py-3 font-medium text-foreground">{{ $p->judul }}</td>
                            <td class="px-5 py-3 text-muted-foreground hidden md:table-cell">{{ ucfirst($p->tipe) }}</td>
                            <td class="px-5 py-3 text-muted-foreground text-xs hidden lg:table-cell">{{ $p->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-5 py-3">
                                @if ($p->dipublikasikan)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400">Publik</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-muted text-muted-foreground">Draft</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button @@click="$dispatch('open-modal', 'editPengumuman-{{ $p->id }}')" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit" aria-label="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <form method="POST" action="{{ route('admin.pengumuman.destroy', $p) }}" class="inline" onsubmit="return confirm('Yakin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-colors" title="Hapus" aria-label="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full bg-muted flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6"/></svg>
                                    </div>
                                    <p class="text-sm font-medium text-muted-foreground">Belum ada pengumuman</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Create Modal --}}
    <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'createPengumuman') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-show="open" x-transition:enter="transition-opacity duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm"></div>
            <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 sm:scale-100" x-transition:leave-end="opacity-0 sm:scale-95" class="relative bg-card rounded-2xl shadow-2xl border border-border w-full max-w-lg p-6 z-10">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-foreground">Buat Pengumuman</h3>
                    <button @@click="open = false" class="p-1.5 rounded-lg text-muted-foreground hover:text-foreground hover:bg-muted transition-colors" aria-label="Tutup"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
                </div>
                <form method="POST" action="{{ route('admin.pengumuman.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Judul <span class="text-destructive">*</span></label>
                            <input type="text" name="judul" required class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" placeholder="Judul pengumuman" aria-label="Judul">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tipe</label>
                                <select name="tipe" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Tipe Pengumuman">
                                    <option value="info">Info</option>
                                    <option value="berita">Berita</option>
                                    <option value="penting">Penting</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Terbit</label>
                                <input type="datetime-local" name="tanggal_terbit" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Tanggal Terbit">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Konten <span class="text-destructive">*</span></label>
                            <textarea name="konten" rows="6" required class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" placeholder="Isi pengumuman..." aria-label="Konten"></textarea>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="dipublikasikan" id="create_dipublikasikan" value="1" checked class="rounded-lg border-border text-primary focus:ring-ring focus:ring-offset-0">
                            <label for="create_dipublikasikan" class="text-sm font-medium text-foreground">Publikasikan</label>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-border">
                        <button type="button" @@click="open = false" class="px-4 py-2.5 text-sm font-medium text-muted-foreground bg-muted rounded-xl hover:bg-accent transition-colors">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-primary rounded-xl hover:opacity-90 transition-all shadow-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modals --}}
    @foreach ($pengumuman ?? [] as $p)
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'editPengumuman-{{ $p->id }}') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div x-show="open" x-transition:enter="transition-opacity duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm"></div>
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 sm:scale-100" x-transition:leave-end="opacity-0 sm:scale-95" class="relative bg-card rounded-2xl shadow-2xl border border-border w-full max-w-lg p-6 z-10">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-foreground">Edit Pengumuman</h3>
                        <button @@click="open = false" class="p-1.5 rounded-lg text-muted-foreground hover:text-foreground hover:bg-muted transition-colors" aria-label="Tutup"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
                    </div>
                    <form method="POST" action="{{ route('admin.pengumuman.update', $p) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Judul <span class="text-destructive">*</span></label>
                                <input type="text" name="judul" value="{{ $p->judul }}" required class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tipe</label>
                                    <select name="tipe" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
                                        <option value="info" {{ $p->tipe == 'info' ? 'selected' : '' }}>Info</option>
                                        <option value="berita" {{ $p->tipe == 'berita' ? 'selected' : '' }}>Berita</option>
                                        <option value="penting" {{ $p->tipe == 'penting' ? 'selected' : '' }}>Penting</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Terbit</label>
                                    <input type="datetime-local" name="tanggal_terbit" value="{{ $p->tanggal_terbit ? \Carbon\Carbon::parse($p->tanggal_terbit)->format('Y-m-d\TH:i') : '' }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Konten <span class="text-destructive">*</span></label>
                                <textarea name="konten" rows="6" required class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">{{ $p->konten }}</textarea>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="dipublikasikan" id="edit_dipublikasikan_{{ $p->id }}" value="1" {{ $p->dipublikasikan ? 'checked' : '' }} class="rounded-lg border-border text-primary focus:ring-ring focus:ring-offset-0">
                                <label for="edit_dipublikasikan_{{ $p->id }}" class="text-sm font-medium text-foreground">Publikasikan</label>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-border">
                            <button type="button" @@click="open = false" class="px-4 py-2.5 text-sm font-medium text-muted-foreground bg-muted rounded-xl hover:bg-accent transition-colors">Batal</button>
                            <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-primary rounded-xl hover:opacity-90 transition-all shadow-sm">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
