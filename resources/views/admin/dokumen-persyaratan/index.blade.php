@extends('admin.layouts.app')

@section('title', 'Persyaratan Dokumen')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Persyaratan Dokumen</h2>
            <p class="text-sm text-muted-foreground mt-1">Kelola dokumen yang wajib diunggah pendaftar.</p>
        </div>
        <button @@click="$dispatch('open-modal', 'createDokumen')" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors flex items-center gap-2">
            <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Dokumen
        </button>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6">
        <form method="GET" action="{{ route('admin.dokumen-persyaratan.index') }}" class="flex flex-col sm:flex-row items-end gap-4" role="search" aria-label="Cari data dokumen persyaratan">
            <div class="w-full sm:w-64">
                <label class="block text-sm font-medium text-foreground mb-1">Jalur Pendaftaran</label>
                <select name="jalur_pendaftaran_id" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Filter jalur">
                    <option value="">Semua Jalur</option>
                    @foreach ($jalurList as $jl)
                        <option value="{{ $jl->id }}" {{ request('jalur_pendaftaran_id') == $jl->id ? 'selected' : '' }}>{{ $jl->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full">
                <label class="block text-sm font-medium text-foreground mb-1">Cari</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama dokumen..." class="w-full rounded-lg border-border text-sm pl-10 focus:ring-ring focus:border-ring">
                </div>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:opacity-90 transition-all shadow-sm">Cari</button>
                <a href="{{ route('admin.dokumen-persyaratan.index') }}" class="px-4 py-2 bg-muted text-muted-foreground rounded-lg text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto min-w-full">
            <table class="w-full text-sm border-collapse" role="table" aria-label="Daftar dokumen persyaratan">
                <thead class="sticky top-0 z-10 bg-muted/90 backdrop-blur shadow-sm">
                    <tr>
                        <th class="px-5 py-3 font-semibold text-muted-foreground text-left w-12">No</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Nama Dokumen</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Jalur</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Format</th>
                        <th class="px-5 py-3 font-semibold text-muted-foreground text-left">Ukuran Maks</th>
                        <th class="px-5 py-3 font-semibold text-muted-foreground text-left">Status</th>
                        <th class="px-5 py-3 font-semibold text-muted-foreground text-left">Aktif</th>
                        <th class="px-5 py-3 font-semibold text-muted-foreground text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($dokumen ?? [] as $d)
                        <tr class="even:bg-muted/20 hover:bg-accent/50 transition-colors">
                            <td class="px-5 py-3 text-muted-foreground">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 font-medium text-foreground">
                                {{ $d->nama }}
                                @if ($d->keterangan)
                                    <p class="text-xs text-muted-foreground mt-0.5">{{ $d->keterangan }}</p>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-muted-foreground">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-mono font-medium bg-muted text-foreground">{{ $d->jalurPendaftaran?->nama ?? '-' }}</span>
                            </td>
                            <td class="px-5 py-3 text-muted-foreground text-xs">{{ $d->format_file }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $d->max_size ? number_format($d->max_size / 1024, 1) . ' MB' : '-' }}</td>
                            <td class="px-5 py-3">
                                @if ($d->wajib)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/10 text-red-600 dark:text-red-400">Wajib</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-muted text-muted-foreground">Opsional</span>
                                @endif
                            </td>
                            <td class="px-5 py-3">
                                @if ($d->aktif)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-600 dark:text-green-400">Aktif</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-destructive/10 text-destructive">Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button @@click="$dispatch('open-modal', 'editDokumen-{{ $d->id }}')" class="p-2 text-primary hover:bg-primary/10 dark:hover:bg-primary/20 rounded-lg transition-colors" title="Edit" aria-label="Edit">
                                        <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <form method="POST" action="{{ route('admin.dokumen-persyaratan.update', $d) }}" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="nama" value="{{ $d->nama }}">
                                        <input type="hidden" name="keterangan" value="{{ $d->keterangan }}">
                                        <input type="hidden" name="format_file" value="{{ $d->format_file }}">
                                        <input type="hidden" name="max_size" value="{{ $d->max_size }}">
                                        <input type="hidden" name="wajib" value="{{ $d->wajib ? 1 : 0 }}">
                                        <input type="hidden" name="jalur_pendaftaran_id" value="{{ $d->jalur_pendaftaran_id }}">
                                        <input type="hidden" name="aktif" value="{{ $d->aktif ? 0 : 1 }}">
                                        @if ($d->aktif)
                                            <button type="submit" class="p-2 text-destructive hover:bg-destructive/10 rounded-lg transition-colors" title="Nonaktifkan" aria-label="Nonaktifkan">
                                                <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </button>
                                        @else
                                            <button type="submit" class="p-2 text-green-600 dark:text-green-400 hover:bg-green-500/10 dark:hover:bg-green-500/20 rounded-lg transition-colors" title="Aktifkan" aria-label="Aktifkan">
                                                <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </button>
                                        @endif
                                    </form>
                                    <form method="POST" action="{{ route('admin.dokumen-persyaratan.destroy', $d) }}" class="inline" onsubmit="return confirm('Hapus dokumen persyaratan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-destructive hover:bg-destructive/10 rounded-lg transition-colors" title="Hapus" aria-label="Hapus">
                                            <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-8 text-center text-muted-foreground">
                                <svg aria-hidden="true" class="w-12 h-12 mx-auto mb-3 text-muted-foreground/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <p class="text-sm font-medium">Belum ada dokumen persyaratan</p>
                                <p class="text-xs mt-1">Klik tombol "Tambah Dokumen" untuk membuat persyaratan baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Create Modal --}}
    <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'createDokumen') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="create-dokumen-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-lg p-6 z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-foreground" id="create-dokumen-title">Tambah Dokumen Persyaratan</h3>
                    <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground" aria-label="Tutup">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.dokumen-persyaratan.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Nama Dokumen <span class="text-destructive">*</span></label>
                            <input type="text" name="nama" required class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" placeholder="Misal: Ijazah, Akta Kelahiran" aria-label="Nama Dokumen">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Jalur Pendaftaran <span class="text-destructive">*</span></label>
                            <select name="jalur_pendaftaran_id" required class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Jalur Pendaftaran">
                                <option value="">Pilih Jalur</option>
                                @foreach ($jalurList as $jl)
                                    <option value="{{ $jl->id }}">{{ $jl->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Keterangan</label>
                            <textarea name="keterangan" rows="2" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" placeholder="Deskripsi dokumen (opsional)" aria-label="Keterangan"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Format File</label>
                                <input type="text" name="format_file" value="jpg,jpeg,png,pdf" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" placeholder="jpg,jpeg,png,pdf" aria-label="Format File">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Max Size (KB)</label>
                                <input type="number" name="max_size" value="2048" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" placeholder="2048" aria-label="Max Size">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Status</label>
                                <select name="wajib" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Status Dokumen">
                                    <option value="1">Wajib</option>
                                    <option value="0">Opsional</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Aktif</label>
                                <select name="aktif" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Aktif">
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" @@click="open = false" class="px-4 py-2 text-sm font-medium text-foreground bg-muted rounded-lg hover:bg-accent transition-colors" aria-label="Batal">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-primary/90 transition-colors" aria-label="Simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modals --}}
    @foreach ($dokumen ?? [] as $d)
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'editDokumen-{{ $d->id }}') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="edit-dokumen-title-{{ $d->id }}">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-lg p-6 z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-foreground" id="edit-dokumen-title-{{ $d->id }}">Edit Dokumen Persyaratan</h3>
                        <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground" aria-label="Tutup">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('admin.dokumen-persyaratan.update', $d) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Nama Dokumen <span class="text-destructive">*</span></label>
                                <input type="text" name="nama" value="{{ $d->nama }}" required class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Nama Dokumen">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Jalur Pendaftaran <span class="text-destructive">*</span></label>
                                <select name="jalur_pendaftaran_id" required class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Jalur Pendaftaran">
                                    <option value="">Pilih Jalur</option>
                                    @foreach ($jalurList as $jl)
                                        <option value="{{ $jl->id }}" {{ $d->jalur_pendaftaran_id == $jl->id ? 'selected' : '' }}>{{ $jl->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Keterangan</label>
                                <textarea name="keterangan" rows="2" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Keterangan">{{ $d->keterangan }}</textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Format File</label>
                                    <input type="text" name="format_file" value="{{ $d->format_file }}" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Format File">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Max Size (KB)</label>
                                    <input type="number" name="max_size" value="{{ $d->max_size }}" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Max Size">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Status</label>
                                    <select name="wajib" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Status Dokumen">
                                        <option value="1" {{ $d->wajib ? 'selected' : '' }}>Wajib</option>
                                        <option value="0" {{ !$d->wajib ? 'selected' : '' }}>Opsional</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Aktif</label>
                                    <select name="aktif" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring" aria-label="Aktif">
                                        <option value="1" {{ $d->aktif ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ !$d->aktif ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-6">
                            <button type="button" @@click="open = false" class="px-4 py-2 text-sm font-medium text-foreground bg-muted rounded-lg hover:bg-accent transition-colors" aria-label="Batal">Batal</button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-primary/90 transition-colors" aria-label="Simpan Perubahan">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
