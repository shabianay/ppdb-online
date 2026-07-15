@extends('admin.layouts.app')

@section('title', 'Detail Pendaftar - ' . $pendaftar->nama_lengkap)

@section('content')
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <a href="{{ route('admin.verifikasi.index') }}" class="text-sm text-cyan-600 hover:text-cyan-700 font-medium flex items-center gap-1 mb-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Kembali ke Verifikasi
            </a>
            <h2 class="text-2xl font-bold text-foreground">{{ $pendaftar->nama_lengkap }}</h2>
            <p class="text-sm text-muted-foreground mt-1">NISN: {{ $pendaftar->nisn ?? '-' }} | NIK: {{ $pendaftar->nik ?? '-' }}</p>
        </div>
        <div class="flex items-center gap-2">
            @php
                $badgeMap = [
                    'draft' => ['label' => 'Menunggu', 'class' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400'],
                    'menunggu' => ['label' => 'Menunggu', 'class' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400'],
                    'diverifikasi' => ['label' => 'Diverifikasi', 'class' => 'bg-green-500/10 text-green-600 dark:text-green-400'],
                    'ditolak' => ['label' => 'Ditolak', 'class' => 'bg-destructive/10 text-destructive'],
                ];
                $badge = $badgeMap[$pendaftar->status] ?? ['label' => ucfirst($pendaftar->status ?? 'Draft'), 'class' => 'bg-muted text-muted-foreground'];
            @endphp
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $badge['class'] }}">
                {{ $badge['label'] }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Left Column: Data Diri & Orang Tua --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Data Diri --}}
            <div class="bg-card rounded-xl shadow-sm border border-border">
                <div class="px-5 py-4 border-b border-border">
                    <h3 class="text-base font-semibold text-foreground flex items-center gap-2">
                        <svg class="w-5 h-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Data Diri
                    </h3>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">Nama Lengkap</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->nama_lengkap }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">NISN</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->nisn ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">NIK</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->nik ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">Tempat, Tanggal Lahir</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir ? \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d/m/Y') : '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">Jenis Kelamin</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : ($pendaftar->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">Asal Sekolah</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->asal_sekolah ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">No. HP</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->no_hp ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">Jalur Pendaftaran</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->jalurPendaftaran->nama ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">Gelombang</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->gelombang->nama ?? '-' }}</p>
                        </div>
                        <div class="sm:col-span-2">
                            <p class="text-xs text-muted-foreground uppercase tracking-wider">Alamat</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->alamat ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Orang Tua --}}
            <div class="bg-card rounded-xl shadow-sm border border-border">
                <div class="px-5 py-4 border-b border-border">
                    <h3 class="text-base font-semibold text-foreground flex items-center gap-2">
                        <svg class="w-5 h-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Data Orang Tua
                    </h3>
                </div>
                <div class="p-5">
                    @forelse ($pendaftar->orangTua ?? [] as $ortu)
                        <div class="mb-4 last:mb-0 p-4 bg-muted/50 rounded-lg">
                            <p class="text-xs text-muted-foreground uppercase tracking-wider mb-2">{{ $ortu->jenis == 'ayah' ? 'Ayah' : ($ortu->jenis == 'ibu' ? 'Ibu' : ($ortu->jenis == 'wali' ? 'Wali' : ucfirst($ortu->jenis))) }}</p>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div>
                                    <p class="text-xs text-muted-foreground">Nama</p>
                                    <p class="text-sm font-medium text-foreground">{{ $ortu->nama ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-muted-foreground">Pekerjaan</p>
                                    <p class="text-sm font-medium text-foreground">{{ $ortu->pekerjaan ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-muted-foreground">Penghasilan</p>
                                    <p class="text-sm font-medium text-foreground">{{ $ortu->penghasilan ? 'Rp ' . number_format($ortu->penghasilan) : '-' }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-muted-foreground text-center py-4">Belum ada data orang tua</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Right Column: Dokumen & Aksi --}}
        <div class="space-y-6">
            {{-- Dokumen --}}
            <div class="bg-card rounded-xl shadow-sm border border-border">
                <div class="px-5 py-4 border-b border-border">
                    <h3 class="text-base font-semibold text-foreground flex items-center gap-2">
                        <svg class="w-5 h-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Dokumen
                    </h3>
                </div>
                <div class="p-5 space-y-3">
                    @forelse ($pendaftar->dokumenPendaftar ?? [] as $dok)
                        <div class="p-3 border border-border rounded-lg">
                            <div class="flex items-start justify-between">
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm font-medium text-foreground truncate">{{ $dok->dokumenPersyaratan->nama ?? $dok->file_original_name }}</p>
                                    <p class="text-xs text-muted-foreground mt-0.5">
                                        @if ($dok->status == 'diverifikasi')
                                            <span class="text-green-600">Terverifikasi</span>
                                        @elseif ($dok->status == 'ditolak')
                                            <span class="text-red-600">Ditolak</span>
                                        @else
                                            <span class="text-yellow-600">Menunggu</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="flex items-center gap-1 ml-2">
                                    <a href="{{ asset('storage/' . $dok->file_path) }}" target="_blank" class="p-1.5 text-muted-foreground hover:text-cyan-600 hover:bg-cyan-50 rounded transition-colors" title="Lihat">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    @if ($dok->status != 'diverifikasi')
                                        <form method="POST" action="{{ route('admin.dokumen.verifikasi', $dok) }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="diverifikasi">
                                            <button type="submit" class="p-1.5 text-green-400 hover:text-green-600 hover:bg-green-50 rounded transition-colors" title="Verifikasi Dokumen">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.dokumen.verifikasi', $dok) }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit" class="p-1.5 text-red-400 hover:text-red-600 hover:bg-red-50 rounded transition-colors" title="Tolak Dokumen">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            @if ($dok->catatan)
                                <p class="text-xs text-muted-foreground mt-1 italic">Catatan: {{ $dok->catatan }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-muted-foreground text-center py-4">Belum ada dokumen</p>
                    @endforelse
                </div>
            </div>

            {{-- Catatan Verifikasi --}}
            <div class="bg-card rounded-xl shadow-sm border border-border">
                <div class="px-5 py-4 border-b border-border">
                    <h3 class="text-base font-semibold text-foreground flex items-center gap-2">
                        <svg class="w-5 h-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Catatan Verifikasi
                    </h3>
                </div>
                <div class="p-5">
                    @if ($pendaftar->catatan_verifikasi)
                        <div class="p-3 bg-muted/50 rounded-lg text-sm text-foreground">
                            {{ $pendaftar->catatan_verifikasi }}
                        </div>
                    @else
                        <p class="text-sm text-muted-foreground text-center py-3">Belum ada catatan</p>
                    @endif
                </div>
            </div>

            {{-- Aksi Verifikasi --}}
            @if ($pendaftar->status == 'draft' || $pendaftar->status == 'menunggu')
                <div class="bg-card rounded-xl shadow-sm border border-border">
                    <div class="px-5 py-4 border-b border-border">
                        <h3 class="text-base font-semibold text-foreground flex items-center gap-2">
                            <svg class="w-5 h-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Aksi Verifikasi
                        </h3>
                    </div>
                    <div class="p-5 space-y-3">
                        <form method="POST" action="{{ route('admin.verifikasi.approve', $pendaftar) }}" onsubmit="return confirm('Yakin ingin menyetujui pendaftar ini?')">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2.5 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition-colors flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Setujui Pendaftar
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.verifikasi.reject', $pendaftar) }}" onsubmit="return confirm('Yakin ingin menolak pendaftar ini?')">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2.5 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition-colors flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                Tolak Pendaftar
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
