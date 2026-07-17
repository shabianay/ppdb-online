@extends('admin.layouts.app')

@section('title', 'Laporan Keuangan')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">Laporan Keuangan</h1>
        <p class="text-muted-foreground mt-1 text-sm">Rekapitulasi pembayaran PPDB.</p>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.laporan.export-excel') }}?{{ http_build_query(request()->query()) }}" class="px-4 py-2 bg-emerald-600 text-white rounded-xl text-sm font-semibold hover:bg-emerald-700 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3"/></svg>
                Export Excel
            </a>
            <a href="{{ route('admin.laporan.export-pdf') }}?{{ http_build_query(request()->query()) }}" class="px-4 py-2 bg-red-600 text-white rounded-xl text-sm font-semibold hover:bg-red-700 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                Export PDF
            </a>
        </div>
    </div>

    <div class="bg-card rounded-2xl shadow-sm border border-border p-4 sm:p-5 mb-6">
        <form method="GET" action="{{ route('admin.laporan.keuangan') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" role="search" aria-label="Filter keuangan">
            <div>
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Periode Awal</label>
                <input type="date" name="periode_awal" value="{{ request('periode_awal') }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
            </div>
            <div>
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Periode Akhir</label>
                <input type="date" name="periode_akhir" value="{{ request('periode_akhir') }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
            </div>
            <div>
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Jalur</label>
                <select name="jalur" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
                    <option value="">Semua Jalur</option>
                    @foreach ($jalurList ?? [] as $j)
                        <option value="{{ $j->id }}" {{ request('jalur') == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 sm:flex-none px-5 py-2.5 bg-primary text-primary-foreground rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-sm flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
                <a href="{{ route('admin.laporan.keuangan') }}" class="px-4 py-2.5 bg-muted text-muted-foreground rounded-xl text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-card rounded-2xl shadow-sm border border-border p-5">
            <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Total Pendapatan</p>
            <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400 mt-1">Rp {{ number_format($totalPendapatan ?? 0) }}</p>
        </div>
        <div class="bg-card rounded-2xl shadow-sm border border-border p-5">
            <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Total Transaksi</p>
            <p class="text-2xl font-bold text-foreground mt-1">{{ number_format($totalTransaksi ?? 0) }}</p>
        </div>
        <div class="bg-card rounded-2xl shadow-sm border border-border p-5">
            <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Pendaftar Bayar</p>
            <p class="text-2xl font-bold text-purple-600 dark:text-purple-400 mt-1">{{ number_format($totalPendaftarBayar ?? 0) }}</p>
        </div>
        <div class="bg-card rounded-2xl shadow-sm border border-border p-5">
            <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Rata-rata</p>
            <p class="text-2xl font-bold text-amber-600 dark:text-amber-400 mt-1">Rp {{ number_format($totalTransaksi > 0 ? ($totalPendapatan / $totalTransaksi) : 0) }}</p>
        </div>
    </div>

    <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
        <div class="px-6 py-4 border-b border-border">
            <h2 class="text-base font-semibold text-foreground">Transaksi Terbaru</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm" role="table" aria-label="Transaksi terbaru">
                <thead>
                    <tr class="border-b border-border bg-muted/30">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Kode</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Pendaftar</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden md:table-cell">Metode</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-muted-foreground uppercase tracking-wider">Jumlah</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden lg:table-cell">Tanggal</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($transaksiTerbaru ?? [] as $t)
                        <tr class="hover:bg-muted/30 transition-colors">
                            <td class="px-5 py-3 font-mono text-xs text-muted-foreground">{{ $t->kode_transaksi }}</td>
                            <td class="px-5 py-3 font-medium text-foreground">{{ $t->tagihan->pendaftar->nama_lengkap ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground hidden md:table-cell">{{ ucfirst($t->metode ?? '-') }}</td>
                            <td class="px-5 py-3 text-right font-medium text-foreground">Rp {{ number_format($t->jumlah ?? 0) }}</td>
                            <td class="px-5 py-3 text-muted-foreground text-xs hidden lg:table-cell">{{ $t->created_at ? $t->created_at->format('d/m/Y H:i') : '-' }}</td>
                            <td class="px-5 py-3">
                                @php
                                    $paymentMap = [
                                        'lunas' => ['label' => 'Lunas', 'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'],
                                        'pending' => ['label' => 'Pending', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                                        'gagal' => ['label' => 'Gagal', 'classes' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400'],
                                        'expired' => ['label' => 'Expired', 'classes' => 'bg-muted text-muted-foreground'],
                                    ];
                                    $payment = $paymentMap[$t->status] ?? ['label' => ucfirst($t->status ?? 'Pending'), 'classes' => 'bg-muted text-muted-foreground'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $payment['classes'] }}">{{ $payment['label'] }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full bg-muted flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <p class="text-sm font-medium text-muted-foreground">Belum ada transaksi</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
