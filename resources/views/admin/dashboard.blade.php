@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6">
        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Total Pendaftar</p>
                    <p class="text-3xl font-bold text-foreground mt-1">{{ number_format($totalPendaftar ?? 0) }}</p>
                </div>
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <p class="text-xs text-muted-foreground mt-2">Total seluruh pendaftar</p>
        </div>

        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Pending Verifikasi</p>
                    <p class="text-3xl font-bold text-amber-600 mt-1">{{ number_format($pendingVerifikasi ?? 0) }}</p>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <p class="text-xs text-muted-foreground mt-2">Menunggu verifikasi admin</p>
        </div>

        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Total Pembayaran</p>
                    <p class="text-3xl font-bold text-emerald-600 mt-1">Rp {{ number_format($totalPembayaran ?? 0) }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <p class="text-xs text-muted-foreground mt-2">Total pembayaran masuk</p>
        </div>

        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Total User</p>
                    <p class="text-3xl font-bold text-purple-600 mt-1">{{ number_format($totalUser ?? 0) }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
            </div>
            <p class="text-xs text-muted-foreground mt-2">Pengguna terdaftar</p>
        </div>
    </div>

    {{-- Chart & Recent Pendaftar --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        {{-- Chart Placeholder --}}
        <div class="lg:col-span-2 bg-card rounded-xl shadow-sm border border-border p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-semibold text-foreground">Grafik Pendaftar Per Hari</h3>
                <select class="text-sm border-border rounded-lg text-muted-foreground focus:ring-cyan-500 focus:border-cyan-500">
                    <option>7 Hari Terakhir</option>
                    <option>30 Hari Terakhir</option>
                    <option>3 Bulan Terakhir</option>
                </select>
            </div>
            <div class="h-64 bg-muted/50 rounded-lg border-2 border-dashed border-border flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-12 h-12 text-muted-foreground mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <p class="text-sm text-muted-foreground">Grafik akan ditampilkan di sini</p>
                    <p class="text-xs text-muted-foreground mt-1">Integrasikan dengan Chart.js atau Livewire</p>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-card rounded-xl shadow-sm border border-border p-5">
            <h3 class="text-base font-semibold text-foreground mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.verifikasi.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-amber-50 border border-amber-100 hover:bg-amber-100 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center group-hover:bg-amber-200 transition-colors">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-amber-800">Verifikasi Pendaftar</p>
                        <p class="text-xs text-amber-600">{{ $pendingVerifikasi ?? 0 }} menunggu</p>
                    </div>
                </a>

                <a href="{{ route('admin.jalur-pendaftaran.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 border border-blue-100 hover:bg-primary/10 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-blue-800">Atur Jalur Pendaftaran</p>
                        <p class="text-xs text-primary">Kelola jalur & kuota</p>
                    </div>
                </a>

                <a href="{{ route('admin.pengumuman.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-purple-50 border border-purple-100 hover:bg-purple-100 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-purple-800">Buat Pengumuman</p>
                        <p class="text-xs text-purple-600">Informasi terbaru</p>
                    </div>
                </a>

                <a href="{{ route('admin.seleksi.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-emerald-50 border border-emerald-100 hover:bg-emerald-100 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center group-hover:bg-emerald-200 transition-colors">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-emerald-800">Hasil Seleksi</p>
                        <p class="text-xs text-emerald-600">Kelola pengumuman hasil</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- Recent Pendaftar --}}
    <div class="bg-card rounded-xl shadow-sm border border-border">
        <div class="flex items-center justify-between px-5 py-4 border-b border-border">
            <h3 class="text-base font-semibold text-foreground">Pendaftar Terbaru</h3>
            <a href="{{ route('admin.verifikasi.index') }}" class="text-sm text-cyan-600 hover:text-cyan-700 font-medium">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-muted/50 text-left">
                        <th class="px-5 py-3 font-medium text-muted-foreground">Nama</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Jalur</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Gelombang</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Tanggal Daftar</th>
                        <th class="px-5 py-3 font-medium text-muted-foreground">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($recentPendaftar ?? [] as $p)
                        <tr class="hover:bg-muted/50 transition-colors">
                            <td class="px-5 py-3">
                                <a href="{{ route('admin.verifikasi.show', $p) }}" class="text-cyan-600 hover:text-cyan-700 font-medium">
                                    {{ $p->nama_lengkap }}
                                </a>
                            </td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->jalurPendaftaran->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->gelombang->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $p->created_at->format('d/m/Y') }}</td>
                            <td class="px-5 py-3">
                                @php
                                    $statusClasses = [
                                        'draft' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400',
                                        'menunggu' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400',
                                        'diverifikasi' => 'bg-green-500/10 text-green-600 dark:text-green-400',
                                        'ditolak' => 'bg-destructive/10 text-destructive',
                                        'diterima' => 'bg-green-500/10 text-green-600 dark:text-green-400',
                                    ];
                                    $label = ucfirst($p->status ?? 'draft');
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses[$p->status] ?? 'bg-muted text-muted-foreground' }}">
                                    {{ $label }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-muted-foreground">
                                <svg class="w-10 h-10 mx-auto mb-2 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Belum ada pendaftar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
