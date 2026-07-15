@extends('landing.layout')

@section('title', 'Pengumuman')

@section('content')

<section class="relative pt-32 pb-20 lg:pt-40 lg:pb-24 bg-gradient-to-br from-primary via-primary/80 to-primary/60 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-primary-foreground/10 text-primary-foreground/90 rounded-full text-sm font-medium backdrop-blur border border-primary-foreground/10 mb-4">Pengumuman</span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-primary-foreground">Berita & Pengumuman</h1>
        <p class="mt-4 text-lg sm:text-xl text-primary-foreground/80 max-w-2xl mx-auto">Informasi terbaru seputar PPDB Online dan kegiatan pendidikan lainnya.</p>
    </div>
</section>

<section class="py-20 lg:py-28 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <article class="group bg-card rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-border flex flex-col md:flex-row">
                    <div class="md:w-72 h-56 md:h-auto bg-gradient-to-br from-primary to-primary/60 relative shrink-0">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg aria-hidden="true"   class="w-16 h-16 text-primary-foreground/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        </div>
                        <div class="absolute top-4 left-4 bg-card/90 text-foreground text-xs font-semibold px-3 py-1.5 rounded-full">15 Jul 2026</div>
                    </div>
                    <div class="p-6 flex flex-col justify-center flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-0.5 bg-primary/10 text-primary text-xs font-semibold rounded-full">Pengumuman</span>
                            <span class="text-xs text-muted-foreground">Oleh: Admin</span>
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-2 group-hover:text-primary transition-colors">
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 1]) }}">Pengumuman Hasil Seleksi PPDB 2026</a>
                        </h3>
                        <p class="text-muted-foreground leading-relaxed mb-4">Hasil seleksi PPDB Tahun Ajaran 2026/2027 telah diumumkan. Silakan cek hasil seleksi melalui akun masing-masing. Pengumuman ini ditujukan kepada seluruh calon peserta didik yang telah mendaftar melalui jalur zonasi, afirmasi, perpindahan, dan prestasi.</p>
                        <a href="{{ route('landing.pengumuman-detail', ['id' => 1]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80">
                            Baca Selengkapnya
                            <svg aria-hidden="true"   class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>

                <article class="group bg-card rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-border flex flex-col md:flex-row">
                    <div class="md:w-72 h-56 md:h-auto bg-gradient-to-br from-emerald-500 to-teal-600 relative shrink-0">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg aria-hidden="true"   class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="absolute top-4 left-4 bg-card/90 text-foreground text-xs font-semibold px-3 py-1.5 rounded-full">10 Jul 2026</div>
                    </div>
                    <div class="p-6 flex flex-col justify-center flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-0.5 bg-amber-500/10 text-amber-600 dark:text-amber-400 text-xs font-semibold rounded-full">Info Penting</span>
                            <span class="text-xs text-muted-foreground">Oleh: Admin</span>
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-2 group-hover:text-primary transition-colors">
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 2]) }}">Perpanjangan Masa Pendaftaran PPDB</a>
                        </h3>
                        <p class="text-muted-foreground leading-relaxed mb-4">Masa pendaftaran PPDB diperpanjang hingga 31 Juli 2026. Manfaatkan kesempatan ini untuk mendaftarkan putra/putri Anda. Perpanjangan ini dilakukan untuk memberikan kesempatan yang lebih luas bagi masyarakat yang belum mendaftar.</p>
                        <a href="{{ route('landing.pengumuman-detail', ['id' => 2]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80">
                            Baca Selengkapnya
                            <svg aria-hidden="true"   class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>

                <article class="group bg-card rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-border flex flex-col md:flex-row">
                    <div class="md:w-72 h-56 md:h-auto bg-gradient-to-br from-purple-500 to-pink-600 relative shrink-0">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg aria-hidden="true"   class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        </div>
                        <div class="absolute top-4 left-4 bg-card/90 text-foreground text-xs font-semibold px-3 py-1.5 rounded-full">5 Jul 2026</div>
                    </div>
                    <div class="p-6 flex flex-col justify-center flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-0.5 bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-semibold rounded-full">Kegiatan</span>
                            <span class="text-xs text-muted-foreground">Oleh: Admin</span>
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-2 group-hover:text-primary transition-colors">
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 3]) }}">Sosialisasi PPDB Online 2026</a>
                        </h3>
                        <p class="text-muted-foreground leading-relaxed mb-4">Sosialisasi PPDB Online akan dilaksanakan pada 20 Juli 2026 secara daring. Seluruh orang tua calon peserta didik diharapkan hadir. Sosialisasi akan membahas tata cara pendaftaran, jalur yang tersedia, dan persyaratan dokumen.</p>
                        <a href="{{ route('landing.pengumuman-detail', ['id' => 3]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80">
                            Baca Selengkapnya
                            <svg aria-hidden="true"   class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>

                <article class="group bg-card rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-border flex flex-col md:flex-row">
                    <div class="md:w-72 h-56 md:h-auto bg-gradient-to-br from-rose-500 to-red-600 relative shrink-0">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg aria-hidden="true"   class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                        </div>
                        <div class="absolute top-4 left-4 bg-card/90 text-foreground text-xs font-semibold px-3 py-1.5 rounded-full">28 Jun 2026</div>
                    </div>
                    <div class="p-6 flex flex-col justify-center flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-0.5 bg-destructive/10 text-destructive text-xs font-semibold rounded-full">Peringatan</span>
                            <span class="text-xs text-muted-foreground">Oleh: Admin</span>
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-2 group-hover:text-primary transition-colors">
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 4]) }}">Waspada Penipuan Mengatasnamakan PPDB</a>
                        </h3>
                        <p class="text-muted-foreground leading-relaxed mb-4">Dihimbau kepada seluruh masyarakat untuk waspada terhadap segala bentuk penipuan yang mengatasnamakan PPDB. PPDB Online tidak memungut biaya sepeserpun. Segera laporkan jika menemukan indikasi pungutan liar.</p>
                        <a href="{{ route('landing.pengumuman-detail', ['id' => 4]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80">
                            Baca Selengkapnya
                            <svg aria-hidden="true"   class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>

                <div class="flex items-center justify-center gap-2 pt-8">
                    <button class="w-10 h-10 rounded-xl bg-muted text-muted-foreground flex items-center justify-center hover:bg-accent transition-colors" aria-label="Halaman sebelumnya">
                        <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button class="w-10 h-10 rounded-xl bg-primary text-primary-foreground flex items-center justify-center font-semibold" aria-label="Halaman 1" aria-current="page">1</button>
                    <button class="w-10 h-10 rounded-xl bg-muted text-foreground flex items-center justify-center hover:bg-accent transition-colors" aria-label="Halaman 2">2</button>
                    <button class="w-10 h-10 rounded-xl bg-muted text-foreground flex items-center justify-center hover:bg-accent transition-colors" aria-label="Halaman 3">3</button>
                    <span class="text-muted-foreground" aria-hidden="true">...</span>
                    <button class="w-10 h-10 rounded-xl bg-muted text-foreground flex items-center justify-center hover:bg-accent transition-colors" aria-label="Halaman 10">10</button>
                    <button class="w-10 h-10 rounded-xl bg-muted text-muted-foreground flex items-center justify-center hover:bg-accent transition-colors" aria-label="Halaman berikutnya">
                        <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <aside class="space-y-8">
                <div class="bg-card rounded-2xl p-6 border border-border">
                    <h3 class="font-bold text-foreground text-lg mb-4">Kategori</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors">
                                <span>Semua</span>
                                <span class="text-xs bg-muted px-2 py-0.5 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors">
                                <span>Pengumuman</span>
                                <span class="text-xs bg-muted px-2 py-0.5 rounded-full">5</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors">
                                <span>Info Penting</span>
                                <span class="text-xs bg-muted px-2 py-0.5 rounded-full">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors">
                                <span>Kegiatan</span>
                                <span class="text-xs bg-muted px-2 py-0.5 rounded-full">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors">
                                <span>Peringatan</span>
                                <span class="text-xs bg-muted px-2 py-0.5 rounded-full">2</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-card rounded-2xl p-6 border border-border">
                    <h3 class="font-bold text-foreground text-lg mb-4">Pengumuman Terbaru</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 1]) }}" class="group block">
                                <span class="text-xs text-muted-foreground">15 Jul 2026</span>
                                <h4 class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Pengumuman Hasil Seleksi PPDB 2026</h4>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 2]) }}" class="group block">
                                <span class="text-xs text-muted-foreground">10 Jul 2026</span>
                                <h4 class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Perpanjangan Masa Pendaftaran PPDB</h4>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 3]) }}" class="group block">
                                <span class="text-xs text-muted-foreground">5 Jul 2026</span>
                                <h4 class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Sosialisasi PPDB Online 2026</h4>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 4]) }}" class="group block">
                                <span class="text-xs text-muted-foreground">28 Jun 2026</span>
                                <h4 class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Waspada Penipuan Mengatasnamakan PPDB</h4>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-primary to-primary/80 rounded-2xl p-6 text-primary-foreground">
                    <h3 class="font-bold text-lg mb-2">Belum Daftar?</h3>
                    <p class="text-sm text-primary-foreground/80 mb-4">Segera daftarkan putra/putri Anda sebelum batas waktu pendaftaran berakhir.</p>
                    <a href="{{ route('register') }}" class="block text-center px-4 py-2.5 bg-primary-foreground text-primary font-semibold rounded-xl hover:opacity-90 transition-colors text-sm">Daftar Sekarang</a>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
