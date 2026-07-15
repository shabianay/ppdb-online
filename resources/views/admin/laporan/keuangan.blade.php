@extends('admin.layouts.app')

@section('title', 'Laporan Keuangan')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Laporan Keuangan</h2>
            <p class="text-sm text-muted-foreground mt-1">Rekapitulasi pembayaran PPDB</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.laporan.export-excel') }}?{{ http_build_query(request()->query()) }}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors flex items-center gap-2">
                <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-2m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Export Excel
            </a>
            <a href="{{ route('admin.laporan.export-pdf') }}?{{ http_build_query(request()->query()) }}" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition-colors flex items-center gap-2">
                <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                Export PDF
            </a>
        </div>
    </div>

    {{-- Filter --}}
    <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6" role="search" aria-label="Filter laporan keuangan">
        <form method="GET" action="{{ route('admin.laporan.keuangan') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" role="search" aria-label="Cari data laporan keuangan">
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Periode Awal</label>
                <input type="date" name="periode_awal" value="{{ request('periode_awal') }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Periode Akhir</label>
                <input type="date" name="periode_akhir" value="{{ request('periode_akhir') }}" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Jalur Pendaftaran</label>
                <select name="jalur" class="w-full rounded-lg border-border text-sm focus:ring-cyan-500 focus:border-cyan-500">
                    <option value="">Semua Jalur</option>
                    @foreach ($jalurList ?? [] as $j)
                        <option value="{{ $j->id }}" {{ request('jalur') == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors flex items-center gap-1">
                    <svg aria-hidden="true"   class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
                <a href="{{ route('admin.laporan.keuangan') }}" class="px-4 py-2 bg-muted text-muted-foreground rounded-lg text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    {{-- Revenue Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6">
        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <p class="text-sm font-medium text-muted-foreground">Total Pendapatan</p>
            <p class="text-3xl font-bold text-emerald-600 mt-1">Rp {{ number_format($totalPendapatan ?? 0) }}</p>
            <p class="text-xs text-muted-foreground mt-2">Seluruh pembayaran diterima</p>
        </div>
        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <p class="text-sm font-medium text-muted-foreground">Total Transaksi</p>
            <p class="text-3xl font-bold text-primary mt-1">{{ number_format($totalTransaksi ?? 0) }}</p>
            <p class="text-xs text-muted-foreground mt-2">Jumlah pembayaran masuk</p>
        </div>
        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <p class="text-sm font-medium text-muted-foreground">Total Pendaftar Bayar</p>
            <p class="text-3xl font-bold text-purple-600 mt-1">{{ number_format($totalPendaftarBayar ?? 0) }}</p>
            <p class="text-xs text-muted-foreground mt-2">Pendaftar yang sudah bayar</p>
        </div>
        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <p class="text-sm font-medium text-muted-foreground">Rata-rata Pembayaran</p>
            <p class="text-3xl font-bold text-amber-600 mt-1">Rp {{ number_format($totalTransaksi > 0 ? ($totalPendapatan / $totalTransaksi) : 0) }}</p>
            <p class="text-xs text-muted-foreground mt-2">Per transaksi</p>
        </div>
    </div>

    {{-- Per Jalur Breakdown --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        {{-- Per Jalur Table --}}
        <div class="bg-card rounded-xl shadow-sm border border-border overflow-hidden">
            <div class="px-5 py-4 border-b border-border">
                <h3 class="text-base font-semibold text-foreground">Pendapatan Per Jalur</h3>
            </div>
            <div class="overflow-x-auto max-h-[600px]">
                <table class="w-full text-sm" role="table" aria-label="Pendapatan per jalur">
                    <thead class="sticky top-0 z-10">
                        <tr class="bg-muted/90 backdrop-blur shadow-sm text-left">
                            <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Jalur Pendaftaran</th>
                            <th class="px-5 py-4 font-semibold text-muted-foreground text-right">Jumlah Pendaftar</th>
                            <th class="px-5 py-4 font-semibold text-muted-foreground text-right">Total Pembayaran</th>
                            <th class="px-5 py-4 font-semibold text-muted-foreground text-right">Total Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @forelse ($pendapatanPerJalur ?? [] as $item)
                            <tr class="even:bg-muted/20 hover:bg-accent/50 transition-colors">
                                <td class="px-5 py-3 font-medium text-foreground">{{ $item->nama ?? $item['nama'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-muted-foreground text-right">{{ number_format($item->jumlah_pendaftar ?? $item['jumlah_pendaftar'] ?? 0) }}</td>
                                <td class="px-5 py-3 text-muted-foreground text-right">{{ number_format($item->jumlah_pembayaran ?? $item['jumlah_pembayaran'] ?? 0) }}</td>
                                <td class="px-5 py-3 font-medium text-emerald-600 text-right">Rp {{ number_format($item->total_nominal ?? $item['total_nominal'] ?? 0) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-6 text-center text-muted-foreground">
                                    <p class="text-sm">Belum ada data pembayaran</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="bg-muted/50">
                        <tr>
                            <td class="px-5 py-3 font-semibold text-foreground">Total</td>
                            <td class="px-5 py-3 font-semibold text-foreground text-right">{{ number_format(collect($pendapatanPerJalur ?? [])->sum(function($item) { return is_object($item) ? ($item->jumlah_pendaftar ?? 0) : ($item['jumlah_pendaftar'] ?? 0); })) }}</td>
                            <td class="px-5 py-3 font-semibold text-foreground text-right">{{ number_format(collect($pendapatanPerJalur ?? [])->sum(function($item) { return is_object($item) ? ($item->jumlah_pembayaran ?? 0) : ($item['jumlah_pembayaran'] ?? 0); })) }}</td>
                            <td class="px-5 py-3 font-semibold text-emerald-600 text-right">Rp {{ number_format($totalPendapatan ?? 0) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        {{-- Pie Chart Placeholder --}}
        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <h3 class="text-base font-semibold text-foreground mb-4">Distribusi Pendapatan</h3>
            <div class="h-64 bg-muted/50 rounded-lg border-2 border-dashed border-border flex items-center justify-center">
                <div class="text-center">
                    <svg aria-hidden="true"   class="w-12 h-12 text-muted-foreground mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg>
                    <p class="text-sm text-muted-foreground">Grafik distribusi akan ditampilkan di sini</p>
                    <p class="text-xs text-muted-foreground mt-1">Integrasikan dengan Chart.js atau Livewire</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Transactions --}}
    <div class="bg-card rounded-xl shadow-sm border border-border overflow-hidden">
        <div class="px-5 py-4 border-b border-border">
            <h3 class="text-base font-semibold text-foreground">Transaksi Terbaru</h3>
        </div>
        <div class="overflow-x-auto max-h-[600px]">
            <table class="w-full text-sm" role="table" aria-label="Transaksi terbaru">
                <thead class="sticky top-0 z-10">
                    <tr class="bg-muted/90 backdrop-blur shadow-sm text-left">
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Kode Transaksi</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Pendaftar</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Metode</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-right">Jumlah</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Tanggal</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($transaksiTerbaru ?? [] as $t)
                        <tr class="even:bg-muted/20 hover:bg-accent/50 transition-colors">
                            <td class="px-5 py-3 font-mono text-xs text-muted-foreground">{{ $t->kode_transaksi }}</td>
                            <td class="px-5 py-3 font-medium text-foreground">{{ $t->tagihan->pendaftar->nama_lengkap ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ ucfirst($t->metode ?? '-') }}</td>
                            <td class="px-5 py-3 text-right font-medium text-foreground">Rp {{ number_format($t->jumlah ?? 0) }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $t->created_at ? $t->created_at->format('d/m/Y H:i') : '-' }}</td>
                            <td class="px-5 py-3">
                                @php
                                    $paymentBadge = [
                                        'lunas' => 'bg-green-500/10 text-green-600 dark:text-green-400',
                                        'pending' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400',
                                        'gagal' => 'bg-red-100 text-red-700',
                                        'expired' => 'bg-muted text-muted-foreground',
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $paymentBadge[$t->status] ?? 'bg-muted text-muted-foreground' }}">
                                    {{ ucfirst($t->status ?? 'Pending') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-8 text-center text-muted-foreground">
                                <svg aria-hidden="true"   class="w-12 h-12 mx-auto mb-3 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p class="text-sm font-medium">Belum ada transaksi</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
