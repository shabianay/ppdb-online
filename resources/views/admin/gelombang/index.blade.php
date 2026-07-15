@extends('admin.layouts.app')

@section('title', 'Gelombang Pendaftaran')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Gelombang Pendaftaran</h2>
            <p class="text-sm text-muted-foreground mt-1">Kelola gelombang pendaftaran PPDB</p>
        </div>
        <button @@click="$dispatch('open-modal', 'createGelombang')" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors flex items-center gap-2">
            <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Gelombang
        </button>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6">
        <form method="GET" action="{{ route('admin.gelombang.index') }}" class="flex flex-col sm:flex-row items-end gap-4" role="search" aria-label="Cari data gelombang pendaftaran">
            <div class="w-full">
                <label class="block text-sm font-medium text-foreground mb-1">Cari</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama gelombang..." class="w-full rounded-lg border-border text-sm pl-10 focus:ring-ring focus:border-ring">
                </div>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:opacity-90 transition-all shadow-sm">Cari</button>
                <a href="{{ route('admin.gelombang.index') }}" class="px-4 py-2 bg-muted text-muted-foreground rounded-lg text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto max-h-[600px]">
            <table class="w-full text-sm" role="table" aria-label="Daftar gelombang">
                <thead class="sticky top-0 z-10">
                    <tr class="bg-muted/90 backdrop-blur shadow-sm text-left">
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">No</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Nama Gelombang</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Tanggal Mulai</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Tanggal Selesai</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Pendaftar</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Status</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($gelombang ?? [] as $g)
                        <tr class="even:bg-muted/20 hover:bg-accent/50 transition-colors">
                            <td class="px-5 py-3 text-muted-foreground">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 font-medium text-foreground">{{ $g->nama }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $g->tanggal_mulai ? \Carbon\Carbon::parse($g->tanggal_mulai)->format('d/m/Y') : '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $g->tanggal_selesai ? \Carbon\Carbon::parse($g->tanggal_selesai)->format('d/m/Y') : '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $g->pendaftar_count ?? $g->pendaftar->count() ?? 0 }}</td>
                            <td class="px-5 py-3">
                                @if ($g->aktif)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-600 dark:text-green-400">Aktif</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-destructive/10 text-destructive">Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button @@click="$dispatch('open-modal', 'editGelombang-{{ $g->id }}')" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit" aria-label="Edit">
                                        <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <form method="POST" action="{{ route('admin.gelombang.update', $g) }}" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="aktif" value="{{ $g->aktif ? 0 : 1 }}">
                                        <button type="submit" class="p-2 text-muted-foreground hover:text-{{ $g->aktif ? 'red' : 'green' }}-600 hover:bg-muted/50 rounded-lg transition-colors" title="{{ $g->aktif ? 'Nonaktifkan' : 'Aktifkan' }}" aria-label="{{ $g->aktif ? 'Nonaktifkan' : 'Aktifkan' }}">
                                            @if ($g->aktif)
                                                <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            @else
                                                <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-8 text-center text-muted-foreground">
                                <svg aria-hidden="true"   class="w-12 h-12 mx-auto mb-3 text-muted-foreground/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <p class="text-sm font-medium">Belum ada gelombang pendaftaran</p>
                                <p class="text-xs mt-1">Klik tombol "Tambah Gelombang" untuk membuat gelombang baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Create Modal --}}
    <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'createGelombang') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="create-modal-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-lg p-6 z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-foreground" id="create-modal-title">Tambah Gelombang Pendaftaran</h3>
                    <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground" aria-label="Tutup">
                        <svg aria-hidden="true"  class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.gelombang.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Nama Gelombang <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" required class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" placeholder="Misal: Gelombang 1" aria-label="Nama Gelombang">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" aria-label="Tanggal Mulai">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" aria-label="Tanggal Selesai">
                            </div>
                        </div>
                        <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Aktif</label>
                                <select name="aktif" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" aria-label="Status Aktif">
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
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
    @foreach ($gelombang ?? [] as $g)
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'editGelombang-{{ $g->id }}') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="edit-modal-title-{{ $g->id }}">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-lg p-6 z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-foreground" id="edit-modal-title-{{ $g->id }}">Edit Gelombang Pendaftaran</h3>
                        <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground" aria-label="Tutup">
                            <svg aria-hidden="true"  class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('admin.gelombang.update', $g) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Nama Gelombang <span class="text-red-500">*</span></label>
                                <input type="text" name="nama" value="{{ $g->nama }}" required class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" aria-label="Nama Gelombang">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" value="{{ $g->tanggal_mulai ? $g->tanggal_mulai->format('Y-m-d') : '' }}" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" aria-label="Tanggal Mulai">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" value="{{ $g->tanggal_selesai ? $g->tanggal_selesai->format('Y-m-d') : '' }}" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" aria-label="Tanggal Selesai">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Aktif</label>
                                <select name="aktif" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary" aria-label="Status Aktif">
                                    <option value="1" {{ $g->aktif ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ !$g->aktif ? 'selected' : '' }}>Nonaktif</option>
                                </select>
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

@push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
