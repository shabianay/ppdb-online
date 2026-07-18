@extends('landing.layout')

@section('title', 'Pengumuman')

@section('content')

<section class="pt-32 pb-24 lg:pt-40 lg:pb-28 overflow-hidden" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="inline-flex items-center px-4 py-1.5 bg-white/15 text-white text-sm font-medium rounded-full">Pengumuman</p>
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mt-6">Berita & Pengumuman</h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-3xl mx-auto mt-4 leading-relaxed">Informasi terbaru seputar PPDB Online dan kegiatan pendidikan lainnya.</p>
    </div>
</section>

<section class="py-24 lg:py-32 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-6">
                <article class="card group flex flex-col md:flex-row md:items-start gap-6">
                    <div class="w-full md:w-56 h-44 rounded-xl shrink-0 relative overflow-hidden flex items-center justify-center" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
                        <svg aria-hidden="true" class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        <span class="absolute top-3 left-3 bg-white/90 text-foreground text-xs font-medium px-2.5 py-1 rounded-full">15 Jul 2026</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-primary/10 text-primary">Pengumuman</span>
                            <span class="text-xs text-muted-foreground">Admin</span>
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-2 group-hover:text-primary transition-colors">
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 1]) }}">Pengumuman Hasil Seleksi PPDB 2026</a>
                        </h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">Hasil seleksi PPDB Tahun Ajaran 2026/2027 telah diumumkan. Silakan cek hasil seleksi melalui akun masing-masing. Pengumuman ini ditujukan kepada seluruh calon peserta didik yang telah mendaftar.</p>
                        <a href="{{ route('landing.pengumuman-detail', ['id' => 1]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80 transition-colors mt-3">Baca &rarr;</a>
                    </div>
                </article>

                <article class="card group flex flex-col md:flex-row md:items-start gap-6">
                    <div class="w-full md:w-56 h-44 rounded-xl shrink-0 relative overflow-hidden flex items-center justify-center" style="background: linear-gradient(135deg, hsl(161, 94%, 30%), hsl(170, 80%, 26%))">
                        <svg aria-hidden="true" class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="absolute top-3 left-3 bg-white/90 text-foreground text-xs font-medium px-2.5 py-1 rounded-full">10 Jul 2026</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-amber-500/10 text-amber-600">Info Penting</span>
                            <span class="text-xs text-muted-foreground">Admin</span>
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-2 group-hover:text-primary transition-colors">
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 2]) }}">Perpanjangan Masa Pendaftaran PPDB</a>
                        </h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">Masa pendaftaran PPDB diperpanjang hingga 31 Juli 2026. Manfaatkan kesempatan ini untuk mendaftarkan putra/putri Anda. Perpanjangan ini dilakukan untuk memberikan kesempatan yang lebih luas.</p>
                        <a href="{{ route('landing.pengumuman-detail', ['id' => 2]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80 transition-colors mt-3">Baca &rarr;</a>
                    </div>
                </article>

                <article class="card group flex flex-col md:flex-row md:items-start gap-6">
                    <div class="w-full md:w-56 h-44 rounded-xl shrink-0 relative overflow-hidden flex items-center justify-center" style="background: linear-gradient(135deg, hsl(271, 81%, 56%), hsl(330, 81%, 40%))">
                        <svg aria-hidden="true" class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        <span class="absolute top-3 left-3 bg-white/90 text-foreground text-xs font-medium px-2.5 py-1 rounded-full">5 Jul 2026</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-emerald-500/10 text-emerald-600">Kegiatan</span>
                            <span class="text-xs text-muted-foreground">Admin</span>
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-2 group-hover:text-primary transition-colors">
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 3]) }}">Sosialisasi PPDB Online 2026</a>
                        </h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">Sosialisasi PPDB Online akan dilaksanakan pada 20 Juli 2026 secara daring. Seluruh orang tua calon peserta didik diharapkan hadir. Sosialisasi akan membahas tata cara pendaftaran dan jalur yang tersedia.</p>
                        <a href="{{ route('landing.pengumuman-detail', ['id' => 3]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80 transition-colors mt-3">Baca &rarr;</a>
                    </div>
                </article>

                <article class="card group flex flex-col md:flex-row md:items-start gap-6">
                    <div class="w-full md:w-56 h-44 rounded-xl shrink-0 relative overflow-hidden flex items-center justify-center" style="background: linear-gradient(135deg, hsl(0, 72%, 51%), hsl(0, 72%, 38%))">
                        <svg aria-hidden="true" class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                        <span class="absolute top-3 left-3 bg-white/90 text-foreground text-xs font-medium px-2.5 py-1 rounded-full">28 Jun 2026</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-red-500/10 text-red-600">Peringatan</span>
                            <span class="text-xs text-muted-foreground">Admin</span>
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-2 group-hover:text-primary transition-colors">
                            <a href="{{ route('landing.pengumuman-detail', ['id' => 4]) }}">Waspada Penipuan Mengatasnamakan PPDB</a>
                        </h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">Dihimbau kepada seluruh masyarakat untuk waspada terhadap segala bentuk penipuan yang mengatasnamakan PPDB. PPDB Online tidak memungut biaya sepeserpun. Segera laporkan jika menemukan indikasi pungutan liar.</p>
                        <a href="{{ route('landing.pengumuman-detail', ['id' => 4]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80 transition-colors mt-3">Baca &rarr;</a>
                    </div>
                </article>

                <div class="flex items-center justify-center gap-2 pt-4">
                    <button class="w-9 h-9 rounded-xl bg-muted text-muted-foreground flex items-center justify-center hover:bg-accent transition-colors" aria-label="Halaman sebelumnya">
                        <svg aria-hidden="true" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button class="w-9 h-9 rounded-xl bg-primary text-primary-foreground flex items-center justify-center font-semibold text-sm" aria-label="Halaman 1" aria-current="page">1</button>
                    <button class="w-9 h-9 rounded-xl bg-muted text-foreground flex items-center justify-center hover:bg-accent transition-colors text-sm" aria-label="Halaman 2">2</button>
                    <button class="w-9 h-9 rounded-xl bg-muted text-foreground flex items-center justify-center hover:bg-accent transition-colors text-sm" aria-label="Halaman 3">3</button>
                    <span class="text-muted-foreground text-sm">&hellip;</span>
                    <button class="w-9 h-9 rounded-xl bg-muted text-foreground flex items-center justify-center hover:bg-accent transition-colors text-sm" aria-label="Halaman 10">10</button>
                    <button class="w-9 h-9 rounded-xl bg-muted text-muted-foreground flex items-center justify-center hover:bg-accent transition-colors" aria-label="Halaman berikutnya">
                        <svg aria-hidden="true" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="card">
                    <h3 class="font-bold text-foreground mb-4">Kategori</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors"><span>Semua</span><span class="text-xs bg-muted px-1.5 py-0.5 rounded-full">12</span></a></li>
                        <li><a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors"><span>Pengumuman</span><span class="text-xs bg-muted px-1.5 py-0.5 rounded-full">5</span></a></li>
                        <li><a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors"><span>Info Penting</span><span class="text-xs bg-muted px-1.5 py-0.5 rounded-full">3</span></a></li>
                        <li><a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors"><span>Kegiatan</span><span class="text-xs bg-muted px-1.5 py-0.5 rounded-full">2</span></a></li>
                        <li><a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm text-muted-foreground hover:text-primary hover:bg-primary/5 transition-colors"><span>Peringatan</span><span class="text-xs bg-muted px-1.5 py-0.5 rounded-full">2</span></a></li>
                    </ul>
                </div>

                <div class="card">
                    <h3 class="font-bold text-foreground mb-4">Terbaru</h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('landing.pengumuman-detail', ['id' => 1]) }}" class="group block"><span class="text-xs text-muted-foreground">15 Jul 2026</span><p class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Pengumuman Hasil Seleksi PPDB 2026</p></a></li>
                        <li><a href="{{ route('landing.pengumuman-detail', ['id' => 2]) }}" class="group block"><span class="text-xs text-muted-foreground">10 Jul 2026</span><p class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Perpanjangan Masa Pendaftaran PPDB</p></a></li>
                        <li><a href="{{ route('landing.pengumuman-detail', ['id' => 3]) }}" class="group block"><span class="text-xs text-muted-foreground">5 Jul 2026</span><p class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Sosialisasi PPDB Online 2026</p></a></li>
                        <li><a href="{{ route('landing.pengumuman-detail', ['id' => 4]) }}" class="group block"><span class="text-xs text-muted-foreground">28 Jun 2026</span><p class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Waspada Penipuan Mengatasnamakan PPDB</p></a></li>
                    </ul>
                </div>

                <div class="p-6 rounded-2xl text-white" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
                    <p class="font-bold text-lg mb-2">Belum Daftar?</p>
                    <p class="text-sm text-white/80 mb-4">Segera daftarkan putra/putri Anda sebelum batas waktu pendaftaran berakhir.</p>
                    <a href="{{ route('register') }}" class="block text-center py-2.5 bg-white text-primary font-semibold rounded-xl hover:bg-white/90 transition-colors text-sm">Daftar Sekarang</a>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
