@extends('landing.layout')

@section('title', 'Beranda')

@section('content')

<section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-28 lg:py-36">
        <div class="inline-flex items-center px-4 py-1.5 bg-white/15 text-white text-sm font-medium rounded-full">
            <span class="w-1.5 h-1.5 bg-green-400 rounded-full mr-2 animate-pulse"></span>
            PPDB {{ date('Y') }} Telah Dibuka
        </div>
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mt-8">
            Selamat Datang di<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-400">PPDB Online</span>
        </h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-3xl mx-auto mt-6 leading-relaxed">
            Sistem Penerimaan Peserta Didik Baru secara online &mdash; transparan, akuntabel, dan mudah diakses oleh seluruh masyarakat.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-10">
            <a href="{{ route('register') }}" class="btn bg-white text-primary hover:bg-white/90 shadow-lg shadow-black/10 px-8 py-3">Daftar Sekarang</a>
            <a href="{{ route('landing.info') }}" class="btn border border-white/30 text-white hover:bg-white/10 px-8 py-3">Informasi Lengkap</a>
        </div>
            <div class="flex items-center justify-center gap-6 sm:gap-16 mt-16 text-white/80">
            <div class="text-center"><span class="text-3xl font-bold text-white">1.500+</span><p class="text-sm mt-1 text-white/60">Pendaftar</p></div>
            <div class="w-px h-10 bg-white/20"></div>
            <div class="text-center"><span class="text-3xl font-bold text-white">5</span><p class="text-sm mt-1 text-white/60">Jalur</p></div>
            <div class="w-px h-10 bg-white/20"></div>
            <div class="text-center"><span class="text-3xl font-bold text-white">50+</span><p class="text-sm mt-1 text-white/60">Sekolah</p></div>
            <div class="w-px h-10 bg-white/20"></div>
            <div class="text-center"><span class="text-3xl font-bold text-white">100%</span><p class="text-sm mt-1 text-white/60">Online</p></div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg aria-hidden="true" viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 50C240 100 480 0 720 50C960 100 1200 0 1440 50V100H0V50Z" fill="var(--background)" />
        </svg>
    </div>
</section>

<section class="py-24 lg:py-32 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="section-label">Tentang PPDB</p>
        <h2 class="section-title">Apa Itu PPDB Online?</h2>
        <p class="section-desc">PPDB Online adalah sistem penerimaan peserta didik baru secara digital untuk memudahkan proses pendaftaran, seleksi, dan pengumuman hasil secara transparan.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16">
            <div class="card">
                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-5">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-foreground mb-2">Mudah & Cepat</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Proses pendaftaran dilakukan secara online dari mana saja dan kapan saja tanpa harus datang ke sekolah.</p>
            </div>
            <div class="card">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-600 mb-5">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-foreground mb-2">Transparan</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Seluruh proses seleksi dapat dipantau secara real-time oleh pendaftar dengan sistem yang transparan dan terbuka.</p>
            </div>
            <div class="card">
                <div class="w-10 h-10 rounded-xl bg-violet-500/10 flex items-center justify-center text-violet-600 mb-5">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-foreground mb-2">Akuntabel</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Data dan hasil seleksi dijamin keakuratannya dengan sistem terintegrasi yang akuntabel dan dapat dipertanggungjawabkan.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 lg:py-32 bg-muted/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="section-label">Jalur Pendaftaran</p>
        <h2 class="section-title">Pilih Jalur Pendaftaran</h2>
        <p class="section-desc">Tersedia beberapa jalur pendaftaran yang dapat dipilih sesuai dengan kriteria dan kebutuhan Anda.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-16">
            <div class="card text-left">
                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary font-bold text-lg mb-4">1</div>
                <h3 class="text-lg font-bold text-foreground mb-2">Zonasi</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Untuk calon peserta didik yang berdomisili di dalam zonasi sekolah.</p>
                <div class="mt-5 pt-4 border-t border-border flex items-center justify-between">
                    <span class="text-xs text-muted-foreground">Kuota 50%</span>
                    <a href="{{ route('landing.jalur') }}" class="text-xs font-semibold text-primary hover:text-primary/80 transition-colors">Selengkapnya &rarr;</a>
                </div>
            </div>
            <div class="card text-left">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-600 font-bold text-lg mb-4">2</div>
                <h3 class="text-lg font-bold text-foreground mb-2">Afirmasi</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Untuk peserta didik dari keluarga tidak mampu secara ekonomi.</p>
                <div class="mt-5 pt-4 border-t border-border flex items-center justify-between">
                    <span class="text-xs text-muted-foreground">Kuota 15%</span>
                    <a href="{{ route('landing.jalur') }}" class="text-xs font-semibold text-primary hover:text-primary/80 transition-colors">Selengkapnya &rarr;</a>
                </div>
            </div>
            <div class="card text-left">
                <div class="w-10 h-10 rounded-xl bg-violet-500/10 flex items-center justify-center text-violet-600 font-bold text-lg mb-4">3</div>
                <h3 class="text-lg font-bold text-foreground mb-2">Perpindahan</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Untuk peserta didik yang pindah domisili karena perpindahan orang tua.</p>
                <div class="mt-5 pt-4 border-t border-border flex items-center justify-between">
                    <span class="text-xs text-muted-foreground">Kuota 5%</span>
                    <a href="{{ route('landing.jalur') }}" class="text-xs font-semibold text-primary hover:text-primary/80 transition-colors">Selengkapnya &rarr;</a>
                </div>
            </div>
            <div class="card text-left">
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 flex items-center justify-center text-amber-600 font-bold text-lg mb-4">4</div>
                <h3 class="text-lg font-bold text-foreground mb-2">Prestasi</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Untuk peserta didik dengan prestasi akademik atau non-akademik.</p>
                <div class="mt-5 pt-4 border-t border-border flex items-center justify-between">
                    <span class="text-xs text-muted-foreground">Kuota 30%</span>
                    <a href="{{ route('landing.jalur') }}" class="text-xs font-semibold text-primary hover:text-primary/80 transition-colors">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 lg:py-32 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-16">
            <div class="text-center sm:text-left">
                <p class="section-label sm:text-left">Pengumuman</p>
                <h2 class="section-title sm:text-left">Berita & Pengumuman</h2>
            </div>
            <a href="{{ route('landing.pengumuman') }}" class="btn-outline shrink-0">Lihat Semua &rarr;</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($pengumuman as $item)
                <article class="card group">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-xs text-muted-foreground">{{ $item->created_at->format('d M Y') }}</span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-primary/10 text-primary">Pengumuman</span>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-2 group-hover:text-primary transition-colors leading-snug">{{ $item->judul }}</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed mb-5">{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                    <a href="{{ route('landing.pengumuman-detail', $item->id) }}" class="text-sm font-semibold text-primary hover:text-primary/80 transition-colors">Baca &rarr;</a>
                </article>
            @empty
                <div class="col-span-full text-center py-12 text-muted-foreground">
                    <p>Belum ada pengumuman.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-24 lg:py-32 relative overflow-hidden" style="background: linear-gradient(to right, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight tracking-tight">Siap Bergabung?</h2>
        <p class="text-lg sm:text-xl text-white/80 max-w-2xl mx-auto mt-4 leading-relaxed">Daftarkan putra/putri Anda sekarang dan jadilah bagian dari generasi penerus bangsa.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-10">
            <a href="{{ route('register') }}" class="btn bg-white text-primary hover:bg-white/90 shadow-lg shadow-black/10 px-10 py-3">Daftar Sekarang</a>
            <a href="{{ route('landing.kontak') }}" class="btn border border-white/30 text-white hover:bg-white/10 px-10 py-3">Hubungi Kami</a>
        </div>
    </div>
</section>

@endsection
