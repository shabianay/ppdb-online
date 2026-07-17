<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">
            Selamat {{ now()->hour < 12 ? 'Pagi' : (now()->hour < 18 ? 'Siang' : 'Malam') }}, {{ Auth::user()->name }} 👋
        </h1>
        <p class="text-muted-foreground mt-1 text-sm">Dashboard PPDB Anda.</p>
    </x-slot>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="bg-card rounded-2xl shadow-sm border border-border p-5">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Status Pendaftaran</p>
                    @if ($pendaftar)
                        @php
                            $statusMap = [
                                'draft' => ['label' => 'Menunggu', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                                'menunggu' => ['label' => 'Menunggu', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                                'diverifikasi' => ['label' => 'Diverifikasi', 'classes' => 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400'],
                                'ditolak' => ['label' => 'Ditolak', 'classes' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400'],
                                'diterima' => ['label' => 'Diterima', 'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'],
                            ];
                            $s = $statusMap[$pendaftar->status ?? 'draft'] ?? ['label' => ucfirst($pendaftar->status ?? 'Draft'), 'classes' => 'bg-muted text-muted-foreground'];
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold mt-1 {{ $s['classes'] }}">{{ $s['label'] }}</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold mt-1 bg-muted text-muted-foreground">Belum Daftar</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-card rounded-2xl shadow-sm border border-border p-5">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-lg shadow-emerald-500/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Total Tagihan</p>
                    <p class="text-lg font-bold text-foreground mt-1">Rp {{ number_format($tagihan->sum('nominal'), 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="bg-card rounded-2xl shadow-sm border border-border p-5">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-purple-500 to-violet-600 flex items-center justify-center shadow-lg shadow-purple-500/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Dokumen</p>
                    <p class="text-lg font-bold text-foreground mt-1">{{ $dokumen->count() }} / {{ $persyaratan->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Left Column --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Quick Actions --}}
            <div class="bg-card rounded-2xl shadow-sm border border-border p-5">
                <h3 class="text-base font-semibold text-foreground mb-4">Aksi Cepat</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @if (!$pendaftar)
                        <a href="{{ route('pendaftaran.create') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-blue-50/50 dark:bg-blue-500/5 border border-blue-200 dark:border-blue-500/20 hover:bg-blue-50 dark:hover:bg-blue-500/10 transition-all">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            </div>
                            <span class="text-xs font-semibold text-blue-700 dark:text-blue-300 text-center">Daftar Baru</span>
                        </a>
                    @endif
                    @if ($pendaftar)
                        <a href="{{ route('pendaftaran.show', $pendaftar) }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-blue-50/50 dark:bg-blue-500/5 border border-blue-200 dark:border-blue-500/20 hover:bg-blue-50 dark:hover:bg-blue-500/10 transition-all">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </div>
                            <span class="text-xs font-semibold text-blue-700 dark:text-blue-300 text-center">Lihat Pendaftaran</span>
                        </a>
                    @endif
                    <a href="{{ route('tagihan.index') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-emerald-50/50 dark:bg-emerald-500/5 border border-emerald-200 dark:border-emerald-500/20 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 transition-all">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        </div>
                        <span class="text-xs font-semibold text-emerald-700 dark:text-emerald-300 text-center">Tagihan</span>
                    </a>
                    <a href="{{ route('notifikasi.index') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-amber-50/50 dark:bg-amber-500/5 border border-amber-200 dark:border-amber-500/20 hover:bg-amber-50 dark:hover:bg-amber-500/10 transition-all">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 dark:bg-amber-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        </div>
                        <span class="text-xs font-semibold text-amber-700 dark:text-amber-300 text-center">Notifikasi</span>
                    </a>
                    <a href="{{ route('landing.pengumuman') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-purple-50/50 dark:bg-purple-500/5 border border-purple-200 dark:border-purple-500/20 hover:bg-purple-50 dark:hover:bg-purple-500/10 transition-all">
                        <div class="w-10 h-10 rounded-xl bg-purple-100 dark:bg-purple-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6"/></svg>
                        </div>
                        <span class="text-xs font-semibold text-purple-700 dark:text-purple-300 text-center">Pengumuman</span>
                    </a>
                </div>
            </div>

            {{-- Tagihan --}}
            <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-border">
                    <h3 class="text-base font-semibold text-foreground">Tagihan</h3>
                    <a href="{{ route('tagihan.index') }}" class="text-sm text-primary hover:underline font-medium">Lihat Semua →</a>
                </div>
                @if ($tagihan->count() > 0)
                    <div class="divide-y divide-border">
                        @foreach ($tagihan->take(3) as $t)
                            <div class="px-6 py-4 hover:bg-muted/30 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-foreground">{{ $t->jenis_biaya }}</p>
                                        <p class="text-xs text-muted-foreground mt-0.5">Kode: {{ $t->kode }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-foreground">Rp {{ number_format($t->nominal, 0, ',', '.') }}</p>
                                        @php
                                            $tStatusMap = [
                                                'belum_bayar' => ['label' => 'Belum Bayar', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                                                'lunas' => ['label' => 'Lunas', 'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'],
                                                'kadaluarsa' => ['label' => 'Kadaluarsa', 'classes' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400'],
                                            ];
                                            $tStatus = $tStatusMap[$t->status] ?? ['label' => ucfirst($t->status), 'classes' => 'bg-muted text-muted-foreground'];
                                        @endphp
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold mt-1 {{ $tStatus['classes'] }}">{{ $tStatus['label'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="px-6 py-8 text-center text-muted-foreground text-sm">Belum ada tagihan</div>
                @endif
            </div>
        </div>

        {{-- Right Column --}}
        <div class="space-y-6">
            {{-- Pengumuman --}}
            <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h3 class="text-base font-semibold text-foreground">Pengumuman</h3>
                </div>
                @if ($pengumuman->count() > 0)
                    <div class="divide-y divide-border">
                        @foreach ($pengumuman as $item)
                            <a href="{{ route('landing.pengumuman-detail', $item->id) }}" class="block px-6 py-4 hover:bg-muted/30 transition-colors">
                                <p class="text-sm font-medium text-foreground line-clamp-2">{{ $item->judul }}</p>
                                <p class="text-xs text-muted-foreground mt-1">{{ $item->created_at->diffForHumans() }}</p>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="px-6 py-8 text-center text-muted-foreground text-sm">Belum ada pengumuman</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
