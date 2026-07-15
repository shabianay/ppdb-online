@extends('admin.layouts.app')

@section('title', 'Laporan Pendaftar')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Laporan Pendaftar</h2>
            <p class="text-sm text-muted-foreground mt-1">Rekapitulasi data pendaftar PPDB</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.laporan.export-excel') }}?{{ http_build_query(request()->query()) }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors flex items-center gap-2">
                <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Export Excel
            </a>
            <a href="{{ route('admin.laporan.export-pdf') }}?{{ http_build_query(request()->query()) }}" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition-colors flex items-center gap-2">
                <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                Export PDF
            </a>
        </div>
    </div>

    {{-- Filter --}}
    <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6" role="search" aria-label="Filter laporan pendaftar">
        <form method="GET" action="{{ route('admin.laporan.pendaftar') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4" role="search" aria-label="Cari data laporan pendaftar">
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Cari</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau NISN..." class="w-full rounded-lg border-border text-sm pl-10 focus:ring-ring focus:border-ring">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Jalur Pendaftaran</label>
                <select name="jalur" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">
                    <option value="">Semua Jalur</option>
                    @foreach ($jalurList ?? [] as $j)
                        <option value="{{ $j->id }}" {{ request('jalur') == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Gelombang</label>
                <select name="gelombang" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">
                    <option value="">Semua Gelombang</option>
                    @foreach ($gelombangList ?? [] as $g)
                        <option value="{{ $g->id }}" {{ request('gelombang') == $g->id ? 'selected' : '' }}>{{ $g->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Status Verifikasi</label>
                <select name="status" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">
                    <option value="">Semua Status</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Menunggu</option>
                    <option value="diverifikasi" {{ request('status') == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}" class="w-full rounded-lg border-border text-sm focus:ring-primary focus:border-primary">
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors flex items-center gap-1">
                    <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
                <a href="{{ route('admin.laporan.pendaftar') }}" class="px-4 py-2 bg-muted text-muted-foreground rounded-lg text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    {{-- Summary Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-6">
        <div class="bg-card rounded-xl shadow-sm border border-border p-4">
            <p class="text-xs text-muted-foreground uppercase tracking-wider">Total Pendaftar</p>
            <p class="text-2xl font-bold text-foreground mt-1">{{ number_format($pendaftar->total() ?? 0) }}</p>
        </div>
        <div class="bg-card rounded-xl shadow-sm border border-border p-4">
            <p class="text-xs text-muted-foreground uppercase tracking-wider">Diverifikasi</p>
            <p class="text-2xl font-bold text-green-600 mt-1">{{ number_format($totalDiverifikasi ?? 0) }}</p>
        </div>
        <div class="bg-card rounded-xl shadow-sm border border-border p-4">
            <p class="text-xs text-muted-foreground uppercase tracking-wider">Menunggu</p>
            <p class="text-2xl font-bold text-amber-600 mt-1">{{ number_format($totalMenunggu ?? 0) }}</p>
        </div>
        <div class="bg-card rounded-xl shadow-sm border border-border p-4">
            <p class="text-xs text-muted-foreground uppercase tracking-wider">Ditolak</p>
            <p class="text-2xl font-bold text-red-600 mt-1">{{ number_format($totalDitolak ?? 0) }}</p>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-card rounded-xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto max-h-[600px]">
            <table class="w-full text-sm" role="table" aria-label="Daftar laporan pendaftar">
                <thead class="sticky top-0 z-10">
                    <tr class="bg-muted/90 backdrop-blur shadow-sm text-left">
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">No</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">NISN</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Nama Lengkap</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Jalur</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Gelombang</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Jenis Kelamin</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Asal Sekolah</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Tanggal Daftar</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($pendaftar ?? [] as $p)
                        <tr class="even:bg-muted/20 hover:bg-accent/50 transition-colors">
                            <td class="px-5 py-3 text-muted-foreground">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->nisn ?? '-' }}</td>
                            <td class="px-5 py-3 font-medium text-foreground">{{ $p->nama_lengkap }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->jalurPendaftaran->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->gelombang->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->jenis_kelamin == 'L' ? 'Laki-laki' : ($p->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->asal_sekolah ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->created_at->format('d/m/Y') }}</td>
                            <td class="px-5 py-3">
                                @php
                                    $badgeMap = [
                                        'draft' => ['label' => 'Menunggu', 'class' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400'],
                                        'menunggu' => ['label' => 'Menunggu', 'class' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400'],
                                        'diverifikasi' => ['label' => 'Diverifikasi', 'class' => 'bg-green-500/10 text-green-600 dark:text-green-400'],
                                        'ditolak' => ['label' => 'Ditolak', 'class' => 'bg-destructive/10 text-destructive'],
                                    ];
                                    $badge = $badgeMap[$p->status] ?? ['label' => ucfirst($p->status ?? 'Draft'), 'class' => 'bg-muted text-muted-foreground'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badge['class'] }}">
                                    {{ $badge['label'] }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-5 py-8 text-center text-muted-foreground">
                                <svg aria-hidden="true"   class="w-12 h-12 mx-auto mb-3 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <p class="text-sm font-medium">Tidak ada data laporan</p>
                                <p class="text-xs mt-1">Silakan sesuaikan filter untuk menampilkan data.</p>
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
