@extends('admin.layouts.app')

@section('title', 'Pengumuman')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Pengumuman</h2>
            <p class="text-sm text-muted-foreground mt-1">Kelola pengumuman PPDB</p>
        </div>
        <button @@click="$dispatch('open-modal', 'createPengumuman')" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors flex items-center gap-2">
            <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Pengumuman
        </button>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6">
        <form method="GET" action="{{ route('admin.pengumuman.index') }}" class="flex flex-col sm:flex-row items-end gap-4" role="search" aria-label="Cari data pengumuman">
            <div class="w-full">
                <label class="block text-sm font-medium text-foreground mb-1">Cari</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul pengumuman..." class="w-full rounded-lg border-border text-sm pl-10 focus:ring-ring focus:border-ring">
                </div>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:opacity-90 transition-all shadow-sm">Cari</button>
                <a href="{{ route('admin.pengumuman.index') }}" class="px-4 py-2 bg-muted text-muted-foreground rounded-lg text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- List Pengumuman --}}
        <div class="lg:col-span-2 space-y-4">
            @forelse ($pengumuman ?? [] as $p)
                <div class="bg-card rounded-xl shadow-sm border border-border p-5 hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="text-base font-semibold text-foreground">{{ $p->judul }}</h3>
                                @if ($p->dipublikasikan)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-600 dark:text-green-400">Terbit</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-muted text-muted-foreground">Draf</span>
                                @endif
                            </div>
                            <p class="text-xs text-muted-foreground mb-2">
                                Oleh {{ $p->user->name ?? 'Admin' }} &middot;
                                {{ $p->tanggal_terbit ? \Carbon\Carbon::parse($p->tanggal_terbit)->format('d M Y') : '-' }}
                                @if ($p->tipe)
                                    &middot; {{ ucfirst($p->tipe) }}
                                @endif
                            </p>
                            <p class="text-sm text-muted-foreground line-clamp-2">{{ strip_tags($p->konten) }}</p>
                        </div>
                        <div class="flex items-center gap-1 flex-shrink-0">
                            <button @@click="$dispatch('open-modal', 'editPengumuman-{{ $p->id }}')" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit" aria-label="Edit">
                                <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </button>
                            <form method="POST" action="{{ route('admin.pengumuman.destroy', $p) }}" class="inline" onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus" aria-label="Hapus">
                                    <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-card rounded-xl shadow-sm border border-border p-8 text-center">
                    <svg aria-hidden="true"   class="w-12 h-12 mx-auto mb-3 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    <p class="text-sm font-medium text-muted-foreground">Belum ada pengumuman</p>
                    <p class="text-xs text-muted-foreground mt-1">Klik tombol "Tambah Pengumuman" untuk membuat pengumuman baru.</p>
                </div>
            @endforelse
        </div>

        {{-- Sidebar Info --}}
        <div class="bg-card rounded-xl shadow-sm border border-border p-5 h-fit">
            <h3 class="text-base font-semibold text-foreground mb-3">Informasi</h3>
            <div class="space-y-3 text-sm text-muted-foreground">
                <div class="flex items-center justify-between">
                    <span>Total Pengumuman</span>
                    <span class="font-semibold text-foreground">{{ count($pengumuman ?? []) }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span>Dipublikasikan</span>
                    <span class="font-semibold text-green-600">{{ count(collect($pengumuman ?? [])->where('dipublikasikan', true)) }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span>Draf</span>
                    <span class="font-semibold text-muted-foreground">{{ count(collect($pengumuman ?? [])->where('dipublikasikan', false)) }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Create Modal --}}
    <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'createPengumuman') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="create-pengumuman-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-2xl p-6 z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-foreground" id="create-pengumuman-title">Tambah Pengumuman</h3>
                    <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground" aria-label="Tutup">
                        <svg aria-hidden="true"  class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.pengumuman.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Judul <span class="text-red-500">*</span></label>
                            <input type="text" name="judul" required class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" placeholder="Judul pengumuman">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Tipe</label>
                                <select name="tipe" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">
                                    <option value="">Umum</option>
                                    <option value="info">Info</option>
                                    <option value="pendaftaran">Pendaftaran</option>
                                    <option value="seleksi">Seleksi</option>
                                    <option value="pengumuman">Pengumuman</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Tanggal Terbit</label>
                                <input type="datetime-local" name="tanggal_terbit" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Konten <span class="text-red-500">*</span></label>
                            <textarea name="konten" rows="6" required class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" placeholder="Isi pengumuman..."></textarea>
                            <p class="text-xs text-muted-foreground mt-1">Anda dapat menggunakan format HTML sederhana.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Gambar (opsional)</label>
                            <input type="file" name="gambar" accept="image/*" class="w-full text-sm text-muted-foreground file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="dipublikasikan" id="create_dipublikasikan" value="1" checked class="rounded border-input text-primary focus:ring-primary">
                            <label for="create_dipublikasikan" class="text-sm text-foreground">Publikasikan sekarang</label>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" @@click="open = false" class="px-4 py-2 text-sm font-medium text-foreground bg-muted rounded-lg hover:bg-accent transition-colors">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-primary/90 transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modals --}}
    @foreach ($pengumuman ?? [] as $p)
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'editPengumuman-{{ $p->id }}') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="edit-pengumuman-title-{{ $p->id }}">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-2xl p-6 z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-foreground" id="edit-pengumuman-title-{{ $p->id }}">Edit Pengumuman</h3>
                        <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground" aria-label="Tutup">
                            <svg aria-hidden="true"  class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('admin.pengumuman.update', $p) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Judul <span class="text-red-500">*</span></label>
                                <input type="text" name="judul" value="{{ $p->judul }}" required class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Tipe</label>
                                    <select name="tipe" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">
                                        <option value="" {{ !$p->tipe ? 'selected' : '' }}>Umum</option>
                                        <option value="info" {{ $p->tipe == 'info' ? 'selected' : '' }}>Info</option>
                                        <option value="pendaftaran" {{ $p->tipe == 'pendaftaran' ? 'selected' : '' }}>Pendaftaran</option>
                                        <option value="seleksi" {{ $p->tipe == 'seleksi' ? 'selected' : '' }}>Seleksi</option>
                                        <option value="pengumuman" {{ $p->tipe == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Tanggal Terbit</label>
                                    <input type="datetime-local" name="tanggal_terbit" value="{{ $p->tanggal_terbit ? \Carbon\Carbon::parse($p->tanggal_terbit)->format('Y-m-d\TH:i') : '' }}" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Konten <span class="text-red-500">*</span></label>
                                <textarea name="konten" rows="6" required class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">{{ $p->konten }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Gambar</label>
                                @if ($p->gambar)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->judul }}" class="h-20 rounded-lg object-cover">
                                    </div>
                                @endif
                                <input type="file" name="gambar" accept="image/*" class="w-full text-sm text-muted-foreground file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="dipublikasikan" id="edit_dipublikasikan_{{ $p->id }}" value="1" {{ $p->dipublikasikan ? 'checked' : '' }} class="rounded border-input text-primary focus:ring-primary">
                                <label for="edit_dipublikasikan_{{ $p->id }}" class="text-sm text-foreground">Publikasikan</label>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-6">
                            <button type="button" @@click="open = false" class="px-4 py-2 text-sm font-medium text-foreground bg-muted rounded-lg hover:bg-accent transition-colors">Batal</button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-primary/90 transition-colors">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
