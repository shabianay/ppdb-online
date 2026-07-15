@extends('admin.layouts.app')

@section('title', 'Hasil Seleksi')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Hasil Seleksi</h2>
            <p class="text-sm text-muted-foreground mt-1">Kelola hasil seleksi pendaftar PPDB</p>
        </div>
        <div class="flex items-center gap-2">
            <form method="POST" action="{{ route('admin.seleksi.umumkan') }}" onsubmit="return confirm('Yakin ingin mengumumkan semua hasil seleksi? Pengumuman akan dikirim ke seluruh pendaftar yang sudah memiliki status seleksi.')">
                @csrf
                <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    Umumkan Massal
                </button>
            </form>
        </div>
    </div>

    {{-- Filter --}}
    <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6">
        <form method="GET" action="{{ route('admin.seleksi.index') }}" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Jalur Pendaftaran</label>
                <select name="jalur" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                    <option value="">Semua Jalur</option>
                    @foreach ($jalurList ?? [] as $j)
                        <option value="{{ $j->id }}" {{ request('jalur') == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Status Seleksi</label>
                <select name="status" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                    <option value="">Semua Status</option>
                    <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="cadangan" {{ request('status') == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
                    <option value="belum_diseleksi" {{ request('status') == 'belum_diseleksi' ? 'selected' : '' }}>Belum Diseleksi</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-lg text-sm font-medium hover:bg-cyan-700 transition-colors">Filter</button>
                <a href="{{ route('admin.seleksi.index') }}" class="px-4 py-2 bg-muted text-muted-foreground rounded-lg text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-card rounded-xl shadow-sm border border-border">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-muted/50 text-left">
                        <th class="px-5 py-3 font-medium text-muted-foreground">No</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">NISN</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Nama Lengkap</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Jalur</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Gelombang</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Nilai Akhir</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Peringkat</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Status Seleksi</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($pendaftar ?? [] as $p)
                        @php $hasil = $p->hasilSeleksi; @endphp
                        <tr class="hover:bg-muted/50 transition-colors">
                            <td class="px-5 py-3 text-muted-foreground">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->nisn ?? '-' }}</td>
                            <td class="px-5 py-3 font-medium text-foreground">{{ $p->nama_lengkap }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->jalurPendaftaran->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->gelombang->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $hasil->nilai_akhir ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $hasil->peringkat ?? '-' }}</td>
                            <td class="px-5 py-3">
                                @if ($hasil && $hasil->status)
                                    @php
                                        $seleksiBadge = [
                                            'diterima' => 'bg-green-500/10 text-green-600 dark:text-green-400',
                                            'ditolak' => 'bg-destructive/10 text-destructive',
                                            'cadangan' => 'bg-amber-100 text-amber-700',
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $seleksiBadge[$hasil->status] ?? 'bg-muted text-muted-foreground' }}">
                                        {{ ucfirst($hasil->status) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-muted text-muted-foreground">Belum Diseleksi</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-center">
                                <button @@click="$dispatch('open-modal', 'seleksi-{{ $p->id }}')" class="px-3 py-1.5 text-xs font-medium text-cyan-600 bg-cyan-50 rounded-lg hover:bg-cyan-100 transition-colors">
                                    {{ $hasil && $hasil->status ? 'Ubah' : 'Atur' }}
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-5 py-8 text-center text-muted-foreground">
                                <svg class="w-12 h-12 mx-auto mb-3 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                <p class="text-sm font-medium">Tidak ada data pendaftar</p>
                                <p class="text-xs mt-1">Belum ada pendaftar yang selesai diverifikasi.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if (method_exists($pendaftar ?? [], 'links'))
            <div class="px-5 py-3 border-t border-border">
                {{ $pendaftar->links() }}
            </div>
        @endif
    </div>

    {{-- Seleksi Modals --}}
    @foreach ($pendaftar ?? [] as $p)
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="if ($event.detail == 'seleksi-{{ $p->id }}') open = true" x-on:keydown.escape.window="open = false" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @@click="open = false" class="fixed inset-0 bg-black/50"></div>
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-card rounded-xl shadow-xl border border-border w-full max-w-lg p-6 z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">Atur Hasil Seleksi</h3>
                            <p class="text-sm text-muted-foreground mt-0.5">{{ $p->nama_lengkap }} ({{ $p->nisn ?? '-' }})</p>
                        </div>
                        <button @@click="open = false" class="text-muted-foreground hover:text-muted-foreground">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('admin.seleksi.umumkan') }}">
                        @csrf
                        <input type="hidden" name="pendaftar_id" value="{{ $p->id }}">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Status Seleksi <span class="text-red-500">*</span></label>
                                <select name="status" required class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="diterima" {{ ($p->hasilSeleksi->status ?? '') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ ($p->hasilSeleksi->status ?? '') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    <option value="cadangan" {{ ($p->hasilSeleksi->status ?? '') == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Nilai Akhir</label>
                                    <input type="number" name="nilai_akhir" step="0.01" value="{{ $p->hasilSeleksi->nilai_akhir ?? '' }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500" placeholder="0">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-1">Peringkat</label>
                                    <input type="number" name="peringkat" value="{{ $p->hasilSeleksi->peringkat ?? '' }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500" placeholder="0">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-1">Keterangan</label>
                                <textarea name="keterangan" rows="3" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500" placeholder="Catatan tambahan...">{{ $p->hasilSeleksi->keterangan ?? '' }}</textarea>
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
    @endforeach
@endsection

@push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
