@extends('admin.layouts.app')

@section('title', 'Verifikasi Pendaftar')

@section('content')
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">Verifikasi Pendaftar</h1>
        <p class="text-muted-foreground mt-1 text-sm">Kelola dan verifikasi data pendaftar PPDB.</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
        <div class="bg-card rounded-2xl shadow-sm border border-border p-4">
            <p class="text-xs font-medium text-muted-foreground uppercase tracking-wider">Total</p>
            <p class="text-2xl font-bold text-foreground mt-1">{{ number_format($pendaftar->total() ?? 0) }}</p>
        </div>
        <div class="bg-card rounded-2xl shadow-sm border border-border p-4">
            <p class="text-xs font-medium text-muted-foreground uppercase tracking-wider">Menunggu</p>
            <p class="text-2xl font-bold text-amber-600 dark:text-amber-400 mt-1">{{ number_format($pendaftar->where('status', 'draft')->count() ?? 0) }}</p>
        </div>
        <div class="bg-card rounded-2xl shadow-sm border border-border p-4">
            <p class="text-xs font-medium text-muted-foreground uppercase tracking-wider">Diverifikasi</p>
            <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400 mt-1">{{ number_format($pendaftar->where('status', 'diverifikasi')->count() ?? 0) }}</p>
        </div>
        <div class="bg-card rounded-2xl shadow-sm border border-border p-4">
            <p class="text-xs font-medium text-muted-foreground uppercase tracking-wider">Ditolak</p>
            <p class="text-2xl font-bold text-red-600 dark:text-red-400 mt-1">{{ number_format($pendaftar->where('status', 'ditolak')->count() ?? 0) }}</p>
        </div>
    </div>

    {{-- Filter --}}
    <div class="bg-card rounded-2xl shadow-sm border border-border p-4 sm:p-5 mb-6" role="search" aria-label="Filter verifikasi">
        <form method="GET" action="{{ route('admin.verifikasi.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Cari</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau NISN..." class="w-full rounded-xl border-border text-sm pl-10 focus:ring-ring focus:border-ring bg-background" aria-label="Cari pendaftar">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Jalur</label>
                <select name="jalur" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Jalur Pendaftaran">
                    <option value="">Semua Jalur</option>
                    @foreach ($jalurList ?? [] as $j)
                        <option value="{{ $j->id }}" {{ request('jalur') == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Status</label>
                <select name="status" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Status">
                    <option value="">Semua Status</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Menunggu</option>
                    <option value="diverifikasi" {{ request('status') == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 sm:flex-none px-5 py-2.5 bg-primary text-primary-foreground rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-sm flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
                <a href="{{ route('admin.verifikasi.index') }}" class="px-4 py-2.5 bg-muted text-muted-foreground rounded-xl text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" role="table" aria-label="Daftar pendaftar">
                <thead>
                    <tr class="border-b border-border bg-muted/30">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">No</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">NISN</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Nama</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden md:table-cell">Jalur</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden lg:table-cell">Tanggal</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-center text-xs font-semibold text-muted-foreground uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($pendaftar ?? [] as $p)
                        <tr class="hover:bg-muted/30 transition-colors">
                            <td class="px-5 py-3 text-muted-foreground">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 text-muted-foreground font-mono text-xs">{{ $p->nisn ?? '-' }}</td>
                            <td class="px-5 py-3">
                                <a href="{{ route('admin.verifikasi.show', $p) }}" class="font-medium text-foreground hover:text-primary transition-colors">{{ $p->nama_lengkap }}</a>
                            </td>
                            <td class="px-5 py-3 text-muted-foreground hidden md:table-cell">{{ $p->jalurPendaftaran->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground text-xs hidden lg:table-cell">{{ $p->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-5 py-3">
                                @php
                                    $statusMap = [
                                        'draft' => ['label' => 'Menunggu', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                                        'menunggu' => ['label' => 'Menunggu', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                                        'diverifikasi' => ['label' => 'Diverifikasi', 'classes' => 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400'],
                                        'ditolak' => ['label' => 'Ditolak', 'classes' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400'],
                                        'diterima' => ['label' => 'Diterima', 'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'],
                                    ];
                                    $status = $statusMap[$p->status ?? 'draft'] ?? ['label' => ucfirst($p->status ?? 'Draft'), 'classes' => 'bg-muted text-muted-foreground'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $status['classes'] }}">{{ $status['label'] }}</span>
                            </td>
                            <td class="px-5 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <a href="{{ route('admin.verifikasi.show', $p) }}" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Detail" aria-label="Lihat detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    @if ($p->status == 'draft' || $p->status == 'menunggu')
                                        <form method="POST" action="{{ route('admin.verifikasi.approve', $p) }}" class="inline" onsubmit="return confirm('Yakin menyetujui?')">
                                            @csrf
                                            <button type="submit" class="p-2 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 rounded-lg transition-colors" title="Setujui" aria-label="Setujui">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.verifikasi.reject', $p) }}" class="inline" onsubmit="return confirm('Yakin menolak?')">
                                            @csrf
                                            <button type="submit" class="p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-colors" title="Tolak" aria-label="Tolak">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full bg-muted flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <p class="text-sm font-medium text-muted-foreground">Tidak ada data pendaftar</p>
                                </div>
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
@endsection
