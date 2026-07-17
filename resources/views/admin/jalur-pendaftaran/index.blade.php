@extends('admin.layouts.app')

@section('title', 'Jalur Pendaftaran')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">Jalur Pendaftaran</h1>
        <p class="text-muted-foreground mt-1 text-sm">Kelola jalur pendaftaran PPDB.</p>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div class="flex items-center gap-3">
            <span class="text-sm text-muted-foreground">Total: <strong class="text-foreground">{{ count($jalur ?? []) }}</strong></span>
        </div>
        <button @@click="$dispatch('open-modal', 'createJalur')" class="px-5 py-2.5 bg-primary text-primary-foreground rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Jalur
        </button>
    </div>

    <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" role="table" aria-label="Daftar jalur pendaftaran">
                <thead>
                    <tr class="border-b border-border bg-muted/30">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Kode</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Nama</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Kuota</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Terdaftar</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden lg:table-cell">Tanggal</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-center text-xs font-semibold text-muted-foreground uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($jalur ?? [] as $j)
                        <tr class="hover:bg-muted/30 transition-colors">
                            <td class="px-5 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-mono font-medium bg-muted text-foreground">{{ $j->kode }}</span></td>
                            <td class="px-5 py-3 font-medium text-foreground">{{ $j->nama }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $j->kuota ?? '∞' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $j->pendaftar_count ?? $j->pendaftar->count() ?? 0 }}</td>
                            <td class="px-5 py-3 text-muted-foreground text-xs hidden lg:table-cell">
                                {{ $j->tanggal_mulai ? \Carbon\Carbon::parse($j->tanggal_mulai)->format('d/m/Y') : '-' }} - {{ $j->tanggal_selesai ? \Carbon\Carbon::parse($j->tanggal_selesai)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-5 py-3">
                                @if ($j->aktif)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400">Aktif</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-muted text-muted-foreground">Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button @@click="$dispatch('open-modal', 'editJalur-{{ $j->id }}')" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit" aria-label="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <form method="POST" action="{{ route('admin.jalur-pendaftaran.update', $j) }}" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="aktif" value="{{ $j->aktif ? 0 : 1 }}">
                                        @if ($j->aktif)
                                            <button type="submit" class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-colors" title="Nonaktifkan" aria-label="Nonaktifkan">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                            </button>
                                        @else
                                            <button type="submit" class="p-2 text-emerald-500 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 rounded-lg transition-colors" title="Aktifkan" aria-label="Aktifkan">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full bg-muted flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4"/></svg>
                                    </div>
                                    <p class="text-sm font-medium text-muted-foreground">Belum ada jalur pendaftaran</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Create Modal --}}
    <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'createJalur') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="create-jalur-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-show="open" x-transition:enter="transition-opacity duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm"></div>
            <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-2xl shadow-2xl border border-border w-full max-w-lg p-6 z-10">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-foreground" id="create-jalur-title">Tambah Jalur</h3>
                    <button @@click="open = false" class="p-1.5 rounded-lg text-muted-foreground hover:text-foreground hover:bg-muted transition-colors" aria-label="Tutup">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.jalur-pendaftaran.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Kode <span class="text-destructive">*</span></label>
                            <input type="text" name="kode" required class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" placeholder="Misal: AFIRMASI" aria-label="Kode Jalur">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Nama Jalur <span class="text-destructive">*</span></label>
                            <input type="text" name="nama" required class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" placeholder="Nama jalur pendaftaran" aria-label="Nama Jalur">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" placeholder="Deskripsi jalur pendaftaran" aria-label="Deskripsi Jalur"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Kuota</label>
                                <input type="number" name="kuota" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" placeholder="0 = tidak terbatas" aria-label="Kuota">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Status</label>
                                <select name="aktif" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Status Aktif">
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Tanggal Mulai">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Tanggal Selesai">
                            </div>
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
    @foreach ($jalur ?? [] as $j)
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'editJalur-{{ $j->id }}') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="edit-jalur-title-{{ $j->id }}">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div x-show="open" x-transition:enter="transition-opacity duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm"></div>
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-2xl shadow-2xl border border-border w-full max-w-lg p-6 z-10">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-foreground" id="edit-jalur-title-{{ $j->id }}">Edit Jalur</h3>
                        <button @@click="open = false" class="p-1.5 rounded-lg text-muted-foreground hover:text-foreground hover:bg-muted transition-colors" aria-label="Tutup">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('admin.jalur-pendaftaran.update', $j) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Kode <span class="text-destructive">*</span></label>
                                <input type="text" name="kode" value="{{ $j->kode }}" required class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Kode Jalur">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Nama Jalur <span class="text-destructive">*</span></label>
                                <input type="text" name="nama" value="{{ $j->nama }}" required class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Nama Jalur">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Deskripsi Jalur">{{ $j->deskripsi }}</textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Kuota</label>
                                    <input type="number" name="kuota" value="{{ $j->kuota }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Kuota">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Status</label>
                                    <select name="aktif" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Status Aktif">
                                        <option value="1" {{ $j->aktif ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ !$j->aktif ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" value="{{ $j->tanggal_mulai ? \Carbon\Carbon::parse($j->tanggal_mulai)->format('Y-m-d') : '' }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Tanggal Mulai">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" value="{{ $j->tanggal_selesai ? \Carbon\Carbon::parse($j->tanggal_selesai)->format('Y-m-d') : '' }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Tanggal Selesai">
                                </div>
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
