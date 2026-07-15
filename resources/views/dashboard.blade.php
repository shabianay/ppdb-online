<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-foreground leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <span class="px-3 py-1 bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-semibold rounded-full">Aktif</span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- User Info Card --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl mb-8 border border-border">
                <div class="bg-gradient-to-r from-primary to-primary/80 px-8 py-6">
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 rounded-2xl bg-primary-foreground/20 backdrop-blur flex items-center justify-center text-primary-foreground text-2xl font-bold shrink-0">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="text-primary-foreground">
                            <h3 class="text-xl font-bold">{{ auth()->user()->name }}</h3>
                            <p class="text-primary-foreground/80 text-sm">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="px-8 py-5 flex flex-wrap gap-6 text-sm text-muted-foreground">
                    <div class="flex items-center gap-2">
                        <svg aria-hidden="true"   class="w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span>Calon Peserta Didik</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg aria-hidden="true"   class="w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Bergabung: {{ auth()->user()->created_at->format('d F Y') }}</span>
                    </div>
                </div>
            </div>

            {{-- Status Pendaftaran --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl mb-8 border border-border">
                <div class="px-8 py-6 border-b border-border">
                    <h3 class="text-lg font-semibold text-foreground">Status Pendaftaran</h3>
                </div>
                <div class="px-8 py-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-amber-500/10 flex items-center justify-center shrink-0">
                            <svg aria-hidden="true"   class="w-8 h-8 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-muted-foreground">Status Pendaftaran</p>
                            <p class="text-xl font-bold text-foreground">Belum Mendaftar</p>
                            <p class="text-xs text-muted-foreground mt-1">Anda belum melakukan pendaftaran PPDB. Silakan lengkapi data diri dan pilih jalur pendaftaran.</p>
                        </div>
                        <a href="#" class="shrink-0 px-6 py-2.5 bg-primary text-primary-foreground font-semibold rounded-xl hover:opacity-90 transition-all text-sm shadow-lg shadow-primary/25">Daftar Sekarang</a>
                    </div>
                </div>
            </div>

            {{-- Quick Links & Notifications --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Quick Links --}}
                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <a href="#" class="group bg-card overflow-hidden shadow-sm sm:rounded-2xl p-6 hover:shadow-md transition-all duration-200 border border-border">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg aria-hidden="true"   class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h4 class="font-semibold text-foreground">Pendaftaran</h4>
                        <p class="text-sm text-muted-foreground mt-1">Kelola data pendaftaran</p>
                    </a>

                    <a href="#" class="group bg-card overflow-hidden shadow-sm sm:rounded-2xl p-6 hover:shadow-md transition-all duration-200 border border-border">
                        <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg aria-hidden="true"   class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h4 class="font-semibold text-foreground">Tagihan</h4>
                        <p class="text-sm text-muted-foreground mt-1">Cek status pembayaran</p>
                    </a>

                    <a href="#" class="group bg-card overflow-hidden shadow-sm sm:rounded-2xl p-6 hover:shadow-md transition-all duration-200 border border-border">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg aria-hidden="true"   class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        </div>
                        <h4 class="font-semibold text-foreground">Notifikasi</h4>
                        <p class="text-sm text-muted-foreground mt-1">Lihat pemberitahuan</p>
                    </a>
                </div>

                {{-- Recent Notifications --}}
                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl border border-border">
                    <div class="px-6 py-5 border-b border-border flex items-center justify-between">
                        <h3 class="font-semibold text-foreground">Notifikasi Terbaru</h3>
                        <span class="px-2 py-0.5 bg-primary/10 text-primary text-xs font-semibold rounded-full">3</span>
                    </div>
                    <div class="divide-y divide-border">
                        <div class="px-6 py-4 hover:bg-muted/50 transition-colors">
                            <div class="flex items-start gap-3">
                                <div class="w-2 h-2 mt-2 bg-primary rounded-full shrink-0"></div>
                                <div>
                                    <p class="text-sm font-medium text-foreground">Pendaftaran PPDB Dibuka</p>
                                    <p class="text-xs text-muted-foreground mt-0.5">Pendaftaran PPDB Online telah dibuka. Segera daftarkan diri Anda.</p>
                                    <p class="text-xs text-muted-foreground/60 mt-1">2 jam yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-4 hover:bg-muted/50 transition-colors">
                            <div class="flex items-start gap-3">
                                <div class="w-2 h-2 mt-2 bg-muted-foreground/40 rounded-full shrink-0"></div>
                                <div>
                                    <p class="text-sm font-medium text-foreground">Pengumuman Hasil Seleksi</p>
                                    <p class="text-xs text-muted-foreground mt-0.5">Hasil seleksi PPDB akan diumumkan pada 20 Agustus 2026.</p>
                                    <p class="text-xs text-muted-foreground/60 mt-1">1 hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-4 hover:bg-muted/50 transition-colors">
                            <div class="flex items-start gap-3">
                                <div class="w-2 h-2 mt-2 bg-muted-foreground/40 rounded-full shrink-0"></div>
                                <div>
                                    <p class="text-sm font-medium text-foreground">Sosialisasi PPDB</p>
                                    <p class="text-xs text-muted-foreground mt-0.5">Sosialisasi PPDB Online akan dilaksanakan pada 20 Juli 2026.</p>
                                    <p class="text-xs text-muted-foreground/60 mt-1">3 hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t border-border">
                        <a href="#" class="text-sm font-semibold text-primary hover:text-primary/80">Lihat Semua Notifikasi</a>
                    </div>
                </div>
            </div>

            {{-- Info Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl p-5 flex items-center gap-4 border border-border">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                        <svg aria-hidden="true"   class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-foreground">0</p>
                        <p class="text-sm text-muted-foreground">Pendaftaran</p>
                    </div>
                </div>

                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl p-5 flex items-center gap-4 border border-border">
                    <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center shrink-0">
                        <svg aria-hidden="true"   class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-foreground">-</p>
                        <p class="text-sm text-muted-foreground">Status</p>
                    </div>
                </div>

                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl p-5 flex items-center gap-4 border border-border">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center shrink-0">
                        <svg aria-hidden="true"   class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-foreground">3</p>
                        <p class="text-sm text-muted-foreground">Notifikasi</p>
                    </div>
                </div>

                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl p-5 flex items-center gap-4 border border-border">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center shrink-0">
                        <svg aria-hidden="true"   class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-foreground">-</p>
                        <p class="text-sm text-muted-foreground">Tagihan</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        // Auto-refresh notifikasi setiap 30 detik
        setInterval(function() {
            // Implementation for real-time notification updates
        }, 30000);
    </script>
    @endpush
</x-app-layout>
