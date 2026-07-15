<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-foreground leading-tight">
                {{ __('Pendaftaran') }}
            </h2>
            @if (auth()->user()->role !== 'admin')
                <a href="{{ route('pendaftaran.create') }}" class="px-4 py-2 bg-primary text-white font-semibold rounded-xl hover:opacity-90 transition-all text-sm shadow-lg shadow-primary/25">
                    + Daftar Baru
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($pendaftaran->count() === 0)
                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="p-12 text-center">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-muted flex items-center justify-center">
                            <svg aria-hidden="true"   class="w-10 h-10 text-muted-foreground/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-foreground mb-2">Belum Ada Pendaftaran</h3>
                        <p class="text-muted-foreground mb-6">Anda belum melakukan pendaftaran PPDB. Silakan daftar sekarang.</p>
                        <a href="{{ route('pendaftaran.create') }}" class="inline-flex px-6 py-2.5 bg-primary text-white font-semibold rounded-xl hover:opacity-90 transition-all text-sm shadow-lg shadow-primary/25">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            @else
                <div class="grid gap-6">
                    @foreach ($pendaftaran as $p)
                        <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                            <div class="p-6">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-start gap-4">
                                        <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center shrink-0">
                                            <span class="text-xl font-bold text-primary">{{ substr($p->nama_lengkap, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-foreground">{{ $p->nama_lengkap }}</h3>
                                            <p class="text-sm text-muted-foreground mt-0.5">
                                                NISN: {{ $p->nisn }} &middot; {{ $p->asal_sekolah }}
                                            </p>
                                            @if (auth()->user()->role === 'admin')
                                                <p class="text-xs text-muted-foreground/60 mt-1">Pendaftar: {{ $p->user->name }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
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
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColors[$p->status] ?? 'bg-muted text-muted-foreground' }}">
                                            {{ $statusLabel[$p->status] ?? $p->status }}
                                        </span>
                                        <a href="{{ route('pendaftaran.show', $p) }}" class="px-4 py-2 bg-muted text-foreground font-medium rounded-xl hover:bg-accent transition-all text-sm">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                                @if ($p->jalurPendaftaran || $p->gelombang)
                                    <div class="mt-4 flex flex-wrap gap-4 text-xs text-muted-foreground">
                                        @if ($p->jalurPendaftaran)
                                            <span class="flex items-center gap-1">
                                                <svg aria-hidden="true"   class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                                {{ $p->jalurPendaftaran->nama }}
                                            </span>
                                        @endif
                                        @if ($p->gelombang)
                                            <span class="flex items-center gap-1">
                                                <svg aria-hidden="true"   class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                {{ $p->gelombang->nama }}
                                            </span>
                                        @endif
                                        <span class="flex items-center gap-1">
                                            <svg aria-hidden="true"   class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            {{ $p->created_at->format('d M Y, H:i') }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
