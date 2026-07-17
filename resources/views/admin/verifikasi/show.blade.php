@extends('admin.layouts.app')

@section('title', 'Detail Pendaftar - ' . $pendaftar->nama_lengkap)

@section('content')
    {{-- Header --}}
    <div class="mb-8">
        <a href="{{ route('admin.verifikasi.index') }}" class="inline-flex items-center gap-1.5 text-sm text-primary hover:underline font-medium mb-3">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-foreground">{{ $pendaftar->nama_lengkap }}</h1>
                <p class="text-muted-foreground mt-1 text-sm">NISN: {{ $pendaftar->nisn ?? '-' }} · NIK: {{ $pendaftar->nik ?? '-' }}</p>
            </div>
            @php
                $statusMap = [
                    'draft' => ['label' => 'Menunggu', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                    'menunggu' => ['label' => 'Menunggu', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                    'diverifikasi' => ['label' => 'Diverifikasi', 'classes' => 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400'],
                    'ditolak' => ['label' => 'Ditolak', 'classes' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400'],
                    'diterima' => ['label' => 'Diterima', 'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'],
                ];
                $status = $statusMap[$pendaftar->status ?? 'draft'] ?? ['label' => ucfirst($pendaftar->status ?? 'Draft'), 'classes' => 'bg-muted text-muted-foreground'];
            @endphp
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold {{ $status['classes'] }}">{{ $status['label'] }}</span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Left: Data Diri --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-card rounded-2xl shadow-sm border border-border">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-base font-semibold text-foreground">Data Diri</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        @foreach ([
                            ['label' => 'Nama Lengkap', 'value' => $pendaftar->nama_lengkap],
                            ['label' => 'NISN', 'value' => $pendaftar->nisn ?? '-'],
                            ['label' => 'NIK', 'value' => $pendaftar->nik ?? '-'],
                            ['label' => 'Tempat, Tanggal Lahir', 'value' => ($pendaftar->tempat_lahir ?? '-') . ', ' . ($pendaftar->tanggal_lahir ? \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d/m/Y') : '-')],
                            ['label' => 'Jenis Kelamin', 'value' => $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : ($pendaftar->jenis_kelamin == 'P' ? 'Perempuan' : '-')],
                            ['label' => 'Asal Sekolah', 'value' => $pendaftar->asal_sekolah ?? '-'],
                            ['label' => 'No. HP', 'value' => $pendaftar->no_hp ?? '-'],
                            ['label' => 'Jalur', 'value' => $pendaftar->jalurPendaftaran->nama ?? '-'],
                            ['label' => 'Gelombang', 'value' => $pendaftar->gelombang->nama ?? '-'],
                        ] as $item)
                            <div class="p-3 bg-muted/30 rounded-xl">
                                <p class="text-[11px] font-semibold text-muted-foreground uppercase tracking-wider">{{ $item['label'] }}</p>
                                <p class="text-sm font-medium text-foreground mt-1">{{ $item['value'] }}</p>
                            </div>
                        @endforeach
                        <div class="p-3 bg-muted/30 rounded-xl sm:col-span-2">
                            <p class="text-[11px] font-semibold text-muted-foreground uppercase tracking-wider">Alamat</p>
                            <p class="text-sm font-medium text-foreground mt-1">{{ $pendaftar->alamat ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Orang Tua --}}
            <div class="bg-card rounded-2xl shadow-sm border border-border">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-base font-semibold text-foreground">Data Orang Tua</h2>
                </div>
                <div class="p-6">
                    @forelse ($pendaftar->orangTua ?? [] as $ortu)
                        <div class="p-4 bg-muted/30 rounded-xl mb-4 last:mb-0">
                            <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">{{ $ortu->jenis == 'ayah' ? 'Ayah' : ($ortu->jenis == 'ibu' ? 'Ibu' : 'Wali') }}</p>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div>
                                    <p class="text-[11px] text-muted-foreground">Nama</p>
                                    <p class="text-sm font-medium text-foreground">{{ $ortu->nama ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-[11px] text-muted-foreground">Pekerjaan</p>
                                    <p class="text-sm font-medium text-foreground">{{ $ortu->pekerjaan ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-[11px] text-muted-foreground">Penghasilan</p>
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

        {{-- Right: Dokumen & Aksi --}}
        <div class="space-y-6">
            {{-- Dokumen --}}
            <div class="bg-card rounded-2xl shadow-sm border border-border">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-base font-semibold text-foreground">Dokumen</h2>
                </div>
                <div class="p-5 space-y-3">
                    @forelse ($pendaftar->dokumenPendaftar ?? [] as $dok)
                        <div class="p-4 bg-muted/30 rounded-xl">
                            <div class="flex items-start justify-between gap-2">
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm font-medium text-foreground truncate">{{ $dok->dokumenPersyaratan->nama ?? $dok->file_original_name }}</p>
                                    @php
                                        $docStatusMap = [
                                            'diverifikasi' => ['label' => 'Terverifikasi', 'classes' => 'text-emerald-600 dark:text-emerald-400'],
                                            'ditolak' => ['label' => 'Ditolak', 'classes' => 'text-red-600 dark:text-red-400'],
                                            'menunggu' => ['label' => 'Menunggu', 'classes' => 'text-amber-600 dark:text-amber-400'],
                                            'draft' => ['label' => 'Draft', 'classes' => 'text-muted-foreground'],
                                        ];
                                        $docStatus = $docStatusMap[$dok->status] ?? ['label' => ucfirst($dok->status), 'classes' => 'text-muted-foreground'];
                                    @endphp
                                    <p class="text-xs font-medium mt-1 {{ $docStatus['classes'] }}">{{ $docStatus['label'] }}</p>
                                </div>
                                <div class="flex items-center gap-1 shrink-0">
                                    <a href="{{ asset('storage/' . $dok->file_path) }}" target="_blank" class="p-1.5 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Lihat" aria-label="Lihat dokumen">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    @if ($dok->status != 'diverifikasi')
                                        <form method="POST" action="{{ route('admin.dokumen.verifikasi', $dok) }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="diverifikasi">
                                            <button type="submit" class="p-1.5 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 rounded-lg transition-colors" title="Verifikasi" aria-label="Verifikasi dokumen">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.dokumen.verifikasi', $dok) }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit" class="p-1.5 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-colors" title="Tolak" aria-label="Tolak dokumen">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            @if ($dok->catatan)
                                <p class="text-xs text-muted-foreground mt-2 italic">Catatan: {{ $dok->catatan }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-muted-foreground text-center py-4">Belum ada dokumen</p>
                    @endforelse
                </div>
            </div>

            {{-- Catatan --}}
            <div class="bg-card rounded-2xl shadow-sm border border-border">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-base font-semibold text-foreground">Catatan Verifikasi</h2>
                </div>
                <div class="p-5">
                    @if ($pendaftar->catatan_verifikasi)
                        <p class="text-sm text-foreground bg-muted/30 p-4 rounded-xl">{{ $pendaftar->catatan_verifikasi }}</p>
                    @else
                        <p class="text-sm text-muted-foreground text-center py-3">Belum ada catatan</p>
                    @endif
                </div>
            </div>

            {{-- Aksi --}}
            @if ($pendaftar->status == 'draft' || $pendaftar->status == 'menunggu')
                <div class="bg-card rounded-2xl shadow-sm border border-border p-5 space-y-3">
                    <h2 class="text-base font-semibold text-foreground mb-4">Aksi Verifikasi</h2>
                    <form method="POST" action="{{ route('admin.verifikasi.approve', $pendaftar) }}" onsubmit="return confirm('Yakin menyetujui pendaftar ini?')">
                        @csrf
                        <button type="submit" class="w-full px-4 py-3 bg-emerald-600 dark:bg-emerald-500 text-white rounded-xl text-sm font-semibold hover:bg-emerald-700 dark:hover:bg-emerald-600 transition-colors flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Setujui Pendaftar
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.verifikasi.reject', $pendaftar) }}" onsubmit="return confirm('Yakin menolak pendaftar ini?')">
                        @csrf
                        <button type="submit" class="w-full px-4 py-3 bg-red-600 dark:bg-red-500 text-white rounded-xl text-sm font-semibold hover:bg-red-700 dark:hover:bg-red-600 transition-colors flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            Tolak Pendaftar
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
