@extends('admin.layouts.app')

@section('title', 'Verifikasi Pendaftar')

@section('content')
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Verifikasi Pendaftar</h2>
            <p class="text-sm text-muted-foreground mt-1">Kelola dan verifikasi data pendaftar PPDB</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-sm text-muted-foreground">Total: <strong class="text-foreground">{{ number_format($pendaftar->total() ?? 0) }}</strong></span>
        </div>
    </div>

    {{-- Filter Card --}}
    <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6">
        <form method="GET" action="{{ route('admin.verifikasi.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
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
                <label class="block text-sm font-medium text-foreground mb-1">Status</label>
                <select name="status" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                    <option value="">Semua Status</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Menunggu</option>
                    <option value="diverifikasi" {{ request('status') == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-lg text-sm font-medium hover:bg-cyan-700 transition-colors">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
                <a href="{{ route('admin.verifikasi.index') }}" class="px-4 py-2 bg-muted text-muted-foreground rounded-lg text-sm font-medium hover:bg-accent transition-colors">
                    Reset
                </a>
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
                        <th class="px-5 py-3 font-medium text-muted-foreground">Tanggal Daftar</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Status</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($pendaftar ?? [] as $p)
                        <tr class="hover:bg-muted/50 transition-colors">
                            <td class="px-5 py-3 text-muted-foreground">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->nisn ?? '-' }}</td>
                            <td class="px-5 py-3">
                                <a href="{{ route('admin.verifikasi.show', $p) }}" class="text-cyan-600 hover:text-cyan-700 font-medium">
                                    {{ $p->nama_lengkap }}
                                </a>
                            </td>
                            <td class="px-5 py-3">
                                <span class="text-muted-foreground">{{ $p->jalurPendaftaran->nama ?? '-' }}</span>
                            </td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->gelombang->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->created_at->format('d/m/Y H:i') }}</td>
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
                            <td class="px-5 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <a href="{{ route('admin.verifikasi.show', $p) }}" class="p-2 text-primary hover:bg-blue-50 rounded-lg transition-colors" title="Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    @if ($p->status == 'draft' || $p->status == 'menunggu')
                                        <form method="POST" action="{{ route('admin.verifikasi.approve', $p) }}" class="inline" onsubmit="return confirm('Yakin ingin menyetujui pendaftar ini?')">
                                            @csrf
                                            <button type="submit" class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" title="Setujui">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.verifikasi.reject', $p) }}" class="inline" onsubmit="return confirm('Yakin ingin menolak pendaftar ini?')">
                                            @csrf
                                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Tolak">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-8 text-center text-muted-foreground">
                                <svg class="w-12 h-12 mx-auto mb-3 text-muted-foreground/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                <p class="text-sm font-medium">Tidak ada data pendaftar</p>
                                <p class="text-xs mt-1">Belum ada pendaftar yang perlu diverifikasi</p>
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
