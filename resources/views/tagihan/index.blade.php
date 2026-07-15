<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-foreground leading-tight">
                {{ __('Tagihan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-600 dark:text-green-400 rounded-2xl text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-6 p-4 bg-destructive/10 border border-destructive/20 text-destructive rounded-2xl text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if ($tagihan->count() === 0)
                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="p-12 text-center">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-muted flex items-center justify-center">
                            <svg class="w-10 h-10 text-muted-foreground/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-foreground mb-2">Belum Ada Tagihan</h3>
                        <p class="text-muted-foreground">Tidak ada tagihan yang perlu dibayarkan saat ini.</p>
                    </div>
                </div>
            @else
                @php
                    $statusColors = [
                        'belum_bayar' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400',
                        'lunas' => 'bg-green-500/10 text-green-600 dark:text-green-400',
                        'kadaluarsa' => 'bg-destructive/10 text-destructive',
                    ];
                    $statusLabel = [
                        'belum_bayar' => 'Belum Dibayar',
                        'lunas' => 'Lunas',
                        'kadaluarsa' => 'Kadaluarsa',
                    ];
                    $totalBelumBayar = $tagihan->where('status', 'belum_bayar')->sum('nominal');
                    $totalLunas = $tagihan->where('status', 'lunas')->sum('nominal');
                @endphp

                {{-- Summary --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl p-5">
                        <p class="text-sm text-muted-foreground">Total Tagihan</p>
                        <p class="text-2xl font-bold text-foreground">Rp {{ number_format($tagihan->sum('nominal'), 0, ',', '.') }}</p>
                        <p class="text-xs text-muted-foreground/60 mt-1">{{ $tagihan->count() }} tagihan</p>
                    </div>
                    <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl p-5">
                        <p class="text-sm text-muted-foreground">Belum Dibayar</p>
                        <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">Rp {{ number_format($totalBelumBayar, 0, ',', '.') }}</p>
                        <p class="text-xs text-muted-foreground/60 mt-1">{{ $tagihan->where('status', 'belum_bayar')->count() }} tagihan</p>
                    </div>
                    <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl p-5">
                        <p class="text-sm text-muted-foreground">Lunas</p>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400">Rp {{ number_format($totalLunas, 0, ',', '.') }}</p>
                        <p class="text-xs text-muted-foreground/60 mt-1">{{ $tagihan->where('status', 'lunas')->count() }} tagihan</p>
                    </div>
                </div>

                {{-- Tagihan List --}}
                <div class="grid gap-6">
                    @foreach ($tagihan as $t)
                        <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                            <div class="p-6">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-start gap-4">
                                        <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center shrink-0">
                                            <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-foreground">{{ $t->jenis_biaya }}</h3>
                                            <p class="text-sm text-muted-foreground mt-0.5">Kode: {{ $t->kode }}</p>
                                            <div class="flex flex-wrap gap-4 mt-2 text-xs text-muted-foreground">
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    Rp {{ number_format($t->nominal, 0, ',', '.') }}
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                    Jatuh Tempo: {{ \Carbon\Carbon::parse($t->jatuh_tempo)->format('d F Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColors[$t->status] ?? 'bg-muted text-muted-foreground' }}">
                                            {{ $statusLabel[$t->status] ?? $t->status }}
                                        </span>
                                        <a href="{{ route('tagihan.show', $t) }}" class="px-4 py-2 bg-muted text-foreground font-medium rounded-xl hover:bg-accent transition-all text-sm">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
