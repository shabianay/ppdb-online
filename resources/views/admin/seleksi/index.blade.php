@extends('admin.layouts.app')

@section('title', 'Seleksi')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">Seleksi Pendaftar</h1>
        <p class="text-muted-foreground mt-1 text-sm">Kelola hasil seleksi pendaftar PPDB.</p>
    </div>

    <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" role="table" aria-label="Daftar seleksi">
                <thead>
                    <tr class="border-b border-border bg-muted/30">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">No</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">NISN</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Nama</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden md:table-cell">Jalur</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden lg:table-cell">Nilai</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden lg:table-cell">Peringkat</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-center text-xs font-semibold text-muted-foreground uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($pendaftar ?? [] as $p)
                        @php $hasil = $p->hasilSeleksi; @endphp
                        <tr class="hover:bg-muted/30 transition-colors">
                            <td class="px-5 py-3 text-muted-foreground">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 text-muted-foreground font-mono text-xs">{{ $p->nisn ?? '-' }}</td>
                            <td class="px-5 py-3 font-medium text-foreground">{{ $p->nama_lengkap }}</td>
                            <td class="px-5 py-3 text-muted-foreground hidden md:table-cell">{{ $p->jalurPendaftaran->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground hidden lg:table-cell">{{ $hasil->nilai_akhir ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground hidden lg:table-cell">{{ $hasil->peringkat ?? '-' }}</td>
                            <td class="px-5 py-3">
                                @if ($hasil && $hasil->status)
                                    @php
                                        $seleksiMap = [
                                            'diterima' => ['label' => 'Diterima', 'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'],
                                            'ditolak' => ['label' => 'Ditolak', 'classes' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400'],
                                            'cadangan' => ['label' => 'Cadangan', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                                        ];
                                        $seleksi = $seleksiMap[$hasil->status] ?? ['label' => ucfirst($hasil->status), 'classes' => 'bg-muted text-muted-foreground'];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $seleksi['classes'] }}">{{ $seleksi['label'] }}</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-muted text-muted-foreground">Belum Diseleksi</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-center">
                                <button @@click="$dispatch('open-modal', 'seleksi-{{ $p->id }}')" class="px-3 py-1.5 text-xs font-semibold text-primary bg-primary/10 hover:bg-primary/20 rounded-lg transition-colors">
                                    {{ $hasil && $hasil->status ? 'Ubah' : 'Atur' }}
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full bg-muted flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                    </div>
                                    <p class="text-sm font-medium text-muted-foreground">Belum ada data seleksi</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if (method_exists($pendaftar ?? [], 'links'))
            <div class="px-5 py-3 border-t border-border">{{ $pendaftar->links() }}</div>
        @endif
    </div>

    {{-- Seleksi Modals --}}
    @foreach ($pendaftar ?? [] as $p)
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'seleksi-{{ $p->id }}') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div x-show="open" x-transition:enter="transition-opacity duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm"></div>
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 sm:scale-100" x-transition:leave-end="opacity-0 sm:scale-95" class="relative bg-card rounded-2xl shadow-2xl border border-border w-full max-w-lg p-6 z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-bold text-foreground">Atur Seleksi</h3>
                            <p class="text-sm text-muted-foreground mt-0.5">{{ $p->nama_lengkap }} ({{ $p->nisn ?? '-' }})</p>
                        </div>
                        <button @@click="open = false" class="p-1.5 rounded-lg text-muted-foreground hover:text-foreground hover:bg-muted transition-colors" aria-label="Tutup"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
                    </div>
                    <form method="POST" action="{{ route('admin.seleksi.umumkan') }}">
                        @csrf
                        <input type="hidden" name="pendaftar_id" value="{{ $p->id }}">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Status Seleksi <span class="text-destructive">*</span></label>
                                <select name="status" required class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="diterima" {{ ($p->hasilSeleksi->status ?? '') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ ($p->hasilSeleksi->status ?? '') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    <option value="cadangan" {{ ($p->hasilSeleksi->status ?? '') == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Nilai Akhir</label>
                                    <input type="number" name="nilai_akhir" step="0.01" value="{{ $p->hasilSeleksi->nilai_akhir ?? '' }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" placeholder="0">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Peringkat</label>
                                    <input type="number" name="peringkat" value="{{ $p->hasilSeleksi->peringkat ?? '' }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" placeholder="0">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Keterangan</label>
                                <textarea name="keterangan" rows="3" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" placeholder="Catatan tambahan...">{{ $p->hasilSeleksi->keterangan ?? '' }}</textarea>
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
    @endforeach
@endsection
