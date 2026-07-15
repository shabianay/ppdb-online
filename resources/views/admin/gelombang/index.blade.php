@extends('admin.layouts.app')

@section('title', 'Gelombang Pendaftaran')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Gelombang Pendaftaran</h2>
            <p class="text-sm text-muted-foreground mt-1">Kelola gelombang pendaftaran PPDB</p>
        </div>
        <button @@click="$dispatch('open-modal', 'createGelombang')" class="px-4 py-2 bg-cyan-600 text-white rounded-lg text-sm font-medium hover:bg-cyan-700 transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Gelombang
        </button>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-muted/50 text-left">
                        <th class="px-5 py-3 font-medium text-muted-foreground">No</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Nama Gelombang</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Tanggal Mulai</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Tanggal Selesai</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Pendaftar</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Status</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($gelombang ?? [] as $g)
                        <tr class="hover:bg-muted/50 transition-colors">
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
                                    <button @@click="$dispatch('open-modal', 'editGelombang-{{ $g->id }}')" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <form method="POST" action="{{ route('admin.gelombang.update', $g) }}" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="aktif" value="{{ $g->aktif ? 0 : 1 }}">
                                        <button type="submit" class="p-2 text-muted-foreground hover:text-{{ $g->aktif ? 'red' : 'green' }}-600 hover:bg-muted/50 rounded-lg transition-colors" title="{{ $g->aktif ? 'Nonaktifkan' : 'Aktifkan' }}">
                                            @if ($g->aktif)
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
                            <td colspan="7" class="px-5 py-8 text-center text-muted-foreground">
                                <svg class="w-12 h-12 mx-auto mb-3 text-muted-foreground/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
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
    <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'createGelombang') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-lg p-6 z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-foreground">Tambah Gelombang Pendaftaran</h3>
                    <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.gelombang.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Nama Gelombang <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" required class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500" placeholder="Misal: Gelombang 1">
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
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Aktif</label>
                            <select name="aktif" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
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
    @foreach ($gelombang ?? [] as $g)
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'editGelombang-{{ $g->id }}') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-lg p-6 z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-foreground">Edit Gelombang Pendaftaran</h3>
                        <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('admin.gelombang.update', $g) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Nama Gelombang <span class="text-red-500">*</span></label>
                                <input type="text" name="nama" value="{{ $g->nama }}" required class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" value="{{ $g->tanggal_mulai ? $g->tanggal_mulai->format('Y-m-d') : '' }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" value="{{ $g->tanggal_selesai ? $g->tanggal_selesai->format('Y-m-d') : '' }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Aktif</label>
                                <select name="aktif" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                    <option value="1" {{ $g->aktif ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ !$g->aktif ? 'selected' : '' }}>Nonaktif</option>
                                </select>
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
