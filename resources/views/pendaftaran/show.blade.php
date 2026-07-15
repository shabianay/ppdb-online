<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('pendaftaran.index') }}" class="text-muted-foreground hover:text-foreground transition-colors">
                    <svg aria-hidden="true"   class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <h2 class="font-semibold text-xl text-foreground leading-tight">
                    {{ __('Detail Pendaftaran') }}
                </h2>
            </div>
            @if ($pendaftar->status === 'draft')
                <a href="{{ route('pendaftaran.edit', $pendaftar) }}" class="px-4 py-2 bg-primary text-white font-semibold rounded-xl hover:opacity-90 transition-all text-sm shadow-lg shadow-primary/25">
                    Edit Pendaftaran
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Status Card --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center">
                                <span class="text-2xl font-bold text-primary">{{ substr($pendaftar->nama_lengkap, 0, 1) }}</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-foreground">{{ $pendaftar->nama_lengkap }}</h3>
                                <p class="text-sm text-muted-foreground">No. Pendaftaran: #{{ str_pad($pendaftar->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                        @php
                            $statusColors = [
                                'draft' => 'bg-muted text-muted-foreground',
                                'verifikasi' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400',
                                'lengkap' => 'bg-green-500/10 text-green-600 dark:text-green-400',
                                'diterima' => 'bg-primary/10 text-primary',
                                'ditolak' => 'bg-destructive/10 text-destructive',
                            ];
                            $statusLabel = [
                                'draft' => 'Draft',
                                'verifikasi' => 'Verifikasi',
                                'lengkap' => 'Lengkap',
                                'diterima' => 'Diterima',
                                'ditolak' => 'Ditolak',
                            ];
                        @endphp
                        <span class="px-4 py-1.5 rounded-full text-sm font-semibold {{ $statusColors[$pendaftar->status] ?? 'bg-muted text-muted-foreground' }}">
                            {{ $statusLabel[$pendaftar->status] ?? $pendaftar->status }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Data Diri --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                <div class="px-8 py-6 border-b border-border">
                    <h3 class="text-lg font-semibold text-foreground">Data Diri</h3>
                </div>
                <div class="px-8 py-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <span class="block text-sm text-muted-foreground">Nama Lengkap</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->nama_lengkap }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">NISN</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->nisn }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">NIK</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->nik }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Tempat, Tanggal Lahir</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d F Y') }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Jenis Kelamin</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Asal Sekolah</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->asal_sekolah }}</span>
                        </div>
                        <div class="sm:col-span-2">
                            <span class="block text-sm text-muted-foreground">Alamat</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->alamat }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">No. HP</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->no_hp }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Tanggal Daftar</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->created_at->format('d F Y, H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Orang Tua --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                <div class="px-8 py-6 border-b border-border">
                    <h3 class="text-lg font-semibold text-foreground">Data Orang Tua</h3>
                </div>
                <div class="px-8 py-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        @foreach (['ayah', 'ibu'] as $jenis)
                            @php $ortu = $pendaftar->orangTua->where('jenis', $jenis)->first(); @endphp
                            <div>
                                <h4 class="text-md font-semibold text-foreground mb-4 capitalize {{ $jenis === 'ayah' ? 'text-primary' : 'text-pink-600 dark:text-pink-400' }}">
                                    {{ $jenis === 'ayah' ? 'Ayah' : 'Ibu' }}
                                </h4>
                                @if ($ortu)
                                    <div class="space-y-3">
                                        <div>
                                            <span class="block text-sm text-muted-foreground">Nama</span>
                                            <span class="block font-medium text-foreground">{{ $ortu->nama }}</span>
                                        </div>
                                        <div>
                                            <span class="block text-sm text-muted-foreground">Pekerjaan</span>
                                            <span class="block font-medium text-foreground">{{ $ortu->pekerjaan }}</span>
                                        </div>
                                        <div>
                                            <span class="block text-sm text-muted-foreground">Penghasilan</span>
                                            <span class="block font-medium text-foreground">{{ $ortu->penghasilan }}</span>
                                        </div>
                                        <div>
                                            <span class="block text-sm text-muted-foreground">No. HP</span>
                                            <span class="block font-medium text-foreground">{{ $ortu->no_hp }}</span>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-sm text-muted-foreground/60">Data {{ $jenis }} belum diisi</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Jalur & Gelombang --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                <div class="px-8 py-6 border-b border-border">
                    <h3 class="text-lg font-semibold text-foreground">Jalur & Gelombang</h3>
                </div>
                <div class="px-8 py-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <span class="block text-sm text-muted-foreground">Jalur Pendaftaran</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->jalurPendaftaran->nama ?? '-' }}</span>
                            @if ($pendaftar->jalurPendaftaran)
                                <span class="block text-xs text-muted-foreground mt-1">{{ $pendaftar->jalurPendaftaran->deskripsi }}</span>
                            @endif
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Gelombang</span>
                            <span class="block font-medium text-foreground">{{ $pendaftar->gelombang->nama ?? '-' }}</span>
                            @if ($pendaftar->gelombang)
                                <span class="block text-xs text-muted-foreground mt-1">
                                    {{ \Carbon\Carbon::parse($pendaftar->gelombang->tanggal_mulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($pendaftar->gelombang->tanggal_selesai)->format('d/m/Y') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Dokumen --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                <div class="px-8 py-6 border-b border-border">
                    <h3 class="text-lg font-semibold text-foreground">Dokumen</h3>
                </div>
                <div class="px-8 py-6">
                    @if ($pendaftar->dokumenPendaftar->count() > 0)
                        <div class="space-y-3">
                            @foreach ($pendaftar->dokumenPendaftar as $dokumen)
                                <div class="flex items-center justify-between p-4 bg-muted/50 rounded-xl">
                                    <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                                            <svg aria-hidden="true" class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-foreground">{{ $dokumen->nama }}</p>
                                            <p class="text-xs text-muted-foreground">{{ $dokumen->status_verifikasi ?? 'Belum diverifikasi' }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ Storage::url($dokumen->file_path) }}" target="_blank" class="px-3 py-1.5 bg-muted text-foreground text-xs font-medium rounded-lg hover:bg-accent transition-colors" aria-label="Lihat dokumen {{ $dokumen->nama }}">
                                        Lihat
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6">
                            <div class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-muted flex items-center justify-center">
                                <svg aria-hidden="true"   class="w-7 h-7 text-muted-foreground/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            </div>
                            <p class="text-sm text-muted-foreground">Belum ada dokumen yang diunggah</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Tagihan --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                <div class="px-8 py-6 border-b border-border">
                    <h3 class="text-lg font-semibold text-foreground">Tagihan</h3>
                </div>
                <div class="px-8 py-6">
                    @if ($pendaftar->tagihan->count() > 0)
                        <div class="space-y-3">
                            @foreach ($pendaftar->tagihan as $tagihan)
                                <div class="flex items-center justify-between p-4 bg-muted/50 rounded-xl">
                                    <div>
                                        <p class="text-sm font-medium text-foreground">{{ $tagihan->deskripsi ?? 'Tagihan' }}</p>
                                        <p class="text-xs text-muted-foreground">Rp {{ number_format($tagihan->jumlah, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold @if($tagihan->status === 'lunas') bg-green-500/10 text-green-600 dark:text-green-400 @else bg-amber-500/10 text-amber-600 dark:text-amber-400 @endif">
                                            {{ ucfirst($tagihan->status ?? 'belum bayar') }}
                                        </span>
                                        @if ($tagihan->status !== 'lunas')
                                            <a href="#" class="px-3 py-1.5 bg-primary text-white text-xs font-medium rounded-lg hover:opacity-90 transition-all" aria-label="Bayar tagihan {{ $tagihan->jenis_biaya }}">
                                                Bayar
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6">
                            <div class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-muted flex items-center justify-center">
                                <svg aria-hidden="true"   class="w-7 h-7 text-muted-foreground/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <p class="text-sm text-muted-foreground">Belum ada tagihan</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Catatan Verifikasi --}}
            @if ($pendaftar->catatan_verifikasi)
                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="px-8 py-6 border-b border-border">
                        <h3 class="text-lg font-semibold text-foreground">Catatan Verifikasi</h3>
                    </div>
                    <div class="px-8 py-6">
                        <p class="text-sm text-foreground">{{ $pendaftar->catatan_verifikasi }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
