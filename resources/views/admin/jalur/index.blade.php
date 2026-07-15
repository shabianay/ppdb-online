@extends('admin.layouts.app')

@section('title', 'Jalur Pendaftaran')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Jalur Pendaftaran</h2>
            <p class="text-sm text-muted-foreground mt-1">Kelola jalur pendaftaran PPDB</p>
        </div>
        <button @@click="$dispatch('open-modal', 'createJalur')" class="px-4 py-2 bg-cyan-600 text-white rounded-lg text-sm font-medium hover:bg-cyan-700 transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Jalur
        </button>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-muted/50 text-left">
                        <th class="px-5 py-3 font-medium text-muted-foreground">Kode</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Nama Jalur</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Kuota</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Terdaftar</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Tanggal Mulai</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Tanggal Selesai</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Status</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($jalur ?? [] as $j)
                        <tr class="hover:bg-muted/50 transition-colors">
                            <td class="px-5 py-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-mono font-medium bg-muted text-foreground">{{ $j->kode }}</span>
                            </td>
                            <td class="px-5 py-3 font-medium text-foreground">{{ $j->nama }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $j->kuota ?? 'Tidak terbatas' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $j->pendaftar_count ?? $j->pendaftar->count() ?? 0 }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $j->tanggal_mulai ? \Carbon\Carbon::parse($j->tanggal_mulai)->format('d/m/Y') : '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $j->tanggal_selesai ? \Carbon\Carbon::parse($j->tanggal_selesai)->format('d/m/Y') : '-' }}</td>
                            <td class="px-5 py-3">
                                @if ($j->aktif)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-600 dark:text-green-400">Aktif</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-destructive/10 text-destructive">Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button @@click="$dispatch('open-modal', 'editJalur-{{ $j->id }}')" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <form method="POST" action="{{ route('admin.jalur-pendaftaran.update', $j) }}" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="aktif" value="{{ $j->aktif ? 0 : 1 }}">
                                        <button type="submit" class="p-2 text-muted-foreground hover:text-{{ $j->aktif ? 'red' : 'green' }}-600 hover:bg-muted/50 rounded-lg transition-colors" title="{{ $j->aktif ? 'Nonaktifkan' : 'Aktifkan' }}">
                                            @if ($j->aktif)
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-8 text-center text-muted-foreground">
                                <svg class="w-12 h-12 mx-auto mb-3 text-muted-foreground/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                                <p class="text-sm font-medium">Belum ada jalur pendaftaran</p>
                                <p class="text-xs mt-1">Klik tombol "Tambah Jalur" untuk membuat jalur baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Create Modal --}}
    <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'createJalur') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-lg p-6 z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-foreground">Tambah Jalur Pendaftaran</h3>
                    <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.jalur-pendaftaran.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Kode <span class="text-red-500">*</span></label>
                            <input type="text" name="kode" required class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500" placeholder="Misal: AFIRMASI">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Nama Jalur <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" required class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500" placeholder="Nama jalur pendaftaran">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500" placeholder="Deskripsi jalur pendaftaran"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Kuota</label>
                                <input type="number" name="kuota" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500" placeholder="0 = tidak terbatas">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Aktif</label>
                                <select name="aktif" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" @@click="open = false" class="px-4 py-2 text-sm font-medium text-foreground bg-muted rounded-lg hover:bg-accent transition-colors">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-cyan-600 rounded-lg hover:bg-cyan-700 transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modals --}}
    @foreach ($jalur ?? [] as $j)
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'editJalur-{{ $j->id }}') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-lg p-6 z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-foreground">Edit Jalur Pendaftaran</h3>
                        <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('admin.jalur-pendaftaran.update', $j) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Kode <span class="text-red-500">*</span></label>
                                <input type="text" name="kode" value="{{ $j->kode }}" required class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Nama Jalur <span class="text-red-500">*</span></label>
                                <input type="text" name="nama" value="{{ $j->nama }}" required class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">{{ $j->deskripsi }}</textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Kuota</label>
                                    <input type="number" name="kuota" value="{{ $j->kuota }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Aktif</label>
                                    <select name="aktif" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                        <option value="1" {{ $j->aktif ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ !$j->aktif ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" value="{{ $j->tanggal_mulai ? $j->tanggal_mulai->format('Y-m-d') : '' }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" value="{{ $j->tanggal_selesai ? $j->tanggal_selesai->format('Y-m-d') : '' }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-6">
                            <button type="button" @@click="open = false" class="px-4 py-2 text-sm font-medium text-foreground bg-muted rounded-lg hover:bg-accent transition-colors">Batal</button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-cyan-600 rounded-lg hover:bg-cyan-700 transition-colors">Simpan Perubahan</button>
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
