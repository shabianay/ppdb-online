@extends('landing.layout')

@section('title', 'Beranda')

@section('content')

<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary via-primary/80 to-primary/60"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="absolute top-20 left-10 w-72 h-72 bg-primary/30 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary/20 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 1s;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center px-4 py-2 bg-primary-foreground/10 backdrop-blur rounded-full text-primary-foreground/90 text-sm font-medium mb-8 border border-primary-foreground/10">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
            PPDB {{ date('Y') }} Telah Dibuka!
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-primary-foreground leading-tight">
            Selamat Datang di
            <span class="block mt-2 bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-orange-300">PPDB Online</span>
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-lg sm:text-xl text-primary-foreground/80 leading-relaxed">
            Sistem Penerimaan Peserta Didik Baru secara online yang transparan, akuntabel, dan mudah diakses.
            Daftarkan putra/putri Anda sekarang juga!
        </p>
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('register') }}" class="group relative px-8 py-4 bg-primary-foreground text-primary font-bold rounded-xl shadow-2xl shadow-primary/30 hover:shadow-primary/50 transition-all duration-300 hover:-translate-y-1">
                Daftar Sekarang
                <span class="absolute inset-0 rounded-xl bg-gradient-to-r from-transparent via-primary-foreground/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
            </a>
            <a href="{{ route('landing.info') }}" class="px-8 py-4 border-2 border-primary-foreground/30 text-primary-foreground font-semibold rounded-xl hover:bg-primary-foreground/10 transition-all duration-300 backdrop-blur">
                Informasi Lengkap
            </a>
        </div>
        <div class="mt-16 grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-3xl mx-auto">
            <div class="text-center p-4 rounded-xl bg-primary-foreground/5 backdrop-blur border border-primary-foreground/10">
                <div class="text-3xl font-bold text-primary-foreground">1.500+</div>
                <div class="text-primary-foreground/60 text-sm mt-1">Pendaftar</div>
            </div>
            <div class="text-center p-4 rounded-xl bg-primary-foreground/5 backdrop-blur border border-primary-foreground/10">
                <div class="text-3xl font-bold text-primary-foreground">5</div>
                <div class="text-primary-foreground/60 text-sm mt-1">Jalur Pendaftaran</div>
            </div>
            <div class="text-center p-4 rounded-xl bg-primary-foreground/5 backdrop-blur border border-primary-foreground/10">
                <div class="text-3xl font-bold text-primary-foreground">50+</div>
                <div class="text-primary-foreground/60 text-sm mt-1">Sekolah</div>
            </div>
            <div class="text-center p-4 rounded-xl bg-primary-foreground/5 backdrop-blur border border-primary-foreground/10">
                <div class="text-3xl font-bold text-primary-foreground">100%</div>
                <div class="text-primary-foreground/60 text-sm mt-1">Online</div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0">
        <svg aria-hidden="true" viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" >
            <path d="M0 50C240 100 480 0 720 50C960 100 1200 0 1440 50V100H0V50Z" fill="white" fill-opacity="1" class="dark:fill-background"/>
        </svg>
    </div>
</section>

<section class="py-20 lg:py-28 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Info PPDB</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Apa Itu PPDB Online?</h2>
            <p class="mt-4 text-muted-foreground leading-relaxed">
                PPDB Online adalah sistem penerimaan peserta didik baru yang dilakukan secara digital
                untuk memudahkan proses pendaftaran, seleksi, dan pengumuman hasil secara transparan.
            </p>
        </div>
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group p-8 bg-card rounded-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-border">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-primary to-primary/80 flex items-center justify-center mb-6 shadow-lg shadow-primary/25 group-hover:scale-110 transition-transform duration-300">
                    <svg aria-hidden="true"  class="w-7 h-7 text-primary-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-foreground mb-3">Mudah & Cepat</h3>
                <p class="text-muted-foreground leading-relaxed">Proses pendaftaran dilakukan secara online dari mana saja dan kapan saja tanpa harus datang ke sekolah.</p>
            </div>
            <div class="group p-8 bg-card rounded-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-border">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center mb-6 shadow-lg shadow-green-500/25 group-hover:scale-110 transition-transform duration-300">
                    <svg aria-hidden="true"  class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-foreground mb-3">Transparan</h3>
                <p class="text-muted-foreground leading-relaxed">Seluruh proses seleksi dapat dipantau secara real-time oleh pendaftar dengan sistem yang transparan.</p>
            </div>
            <div class="group p-8 bg-card rounded-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-border">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center mb-6 shadow-lg shadow-purple-500/25 group-hover:scale-110 transition-transform duration-300">
                    <svg aria-hidden="true"  class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-foreground mb-3">Akuntabel</h3>
                <p class="text-muted-foreground leading-relaxed">Data dan hasil seleksi dijamin keakuratannya dengan sistem terintegrasi yang akuntabel.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 lg:py-28 bg-muted/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Jalur Pendaftaran</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Pilih Jalur Pendaftaran</h2>
            <p class="mt-4 text-muted-foreground leading-relaxed">
                Tersedia beberapa jalur pendaftaran yang dapat dipilih sesuai dengan kriteria dan kebutuhan Anda.
            </p>
        </div>
        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="relative group bg-card rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden border border-border">
                <div class="absolute top-0 right-0 w-24 h-24 bg-primary/10 rounded-bl-full -z-0"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <span class="text-primary font-bold text-lg">1</span>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-2">Jalur Zonasi</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">Untuk calon peserta didik yang berdomisili di dalam zonasi sekolah.</p>
                    <div class="mt-4 pt-4 border-t border-border">
                        <span class="text-xs text-muted-foreground">Kuota: 50%</span>
                    </div>
                </div>
            </div>
            <div class="relative group bg-card rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden border border-border">
                <div class="absolute top-0 right-0 w-24 h-24 bg-green-500/10 rounded-bl-full -z-0"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center mb-4">
                        <span class="text-green-600 dark:text-green-400 font-bold text-lg">2</span>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-2">Jalur Afirmasi</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">Untuk peserta didik dari keluarga tidak mampu/ekonomi lemah.</p>
                    <div class="mt-4 pt-4 border-t border-border">
                        <span class="text-xs text-muted-foreground">Kuota: 15%</span>
                    </div>
                </div>
            </div>
            <div class="relative group bg-card rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden border border-border">
                <div class="absolute top-0 right-0 w-24 h-24 bg-purple-500/10 rounded-bl-full -z-0"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center mb-4">
                        <span class="text-purple-600 dark:text-purple-400 font-bold text-lg">3</span>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-2">Jalur Perpindahan</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">Untuk peserta didik yang pindah domisili karena perpindahan orang tua.</p>
                    <div class="mt-4 pt-4 border-t border-border">
                        <span class="text-xs text-muted-foreground">Kuota: 5%</span>
                    </div>
                </div>
            </div>
            <div class="relative group bg-card rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden border border-border">
                <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/10 rounded-bl-full -z-0"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center mb-4">
                        <span class="text-amber-600 dark:text-amber-400 font-bold text-lg">4</span>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-2">Jalur Prestasi</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">Untuk peserta didik dengan prestasi akademik/non-akademik.</p>
                    <div class="mt-4 pt-4 border-t border-border">
                        <span class="text-xs text-muted-foreground">Kuota: 30%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('landing.jalur') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary/80 transition-colors">
                Lihat Detail Jalur Pendaftaran
                <svg aria-hidden="true"  class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

<section class="py-20 lg:py-28 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <span class="inline-block px-4 py-1.5 bg-amber-500/10 text-amber-600 dark:text-amber-400 rounded-full text-sm font-medium mb-4">Pengumuman</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Berita & Pengumuman</h2>
            </div>
            <a href="{{ route('landing.pengumuman') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary/80 transition-colors shrink-0">
                Lihat Semua
                <svg aria-hidden="true"  class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <article class="group bg-card rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-border">
                <div class="h-48 bg-gradient-to-br from-primary to-primary/60 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg aria-hidden="true"  class="w-16 h-16 text-primary-foreground/30" fill="none" stroke="currentColor" viewBox="0 0 24 24" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    <div class="absolute top-4 left-4 bg-card/90 text-foreground text-xs font-semibold px-3 py-1 rounded-full">15 Jul 2026</div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-foreground mb-2 group-hover:text-primary transition-colors">Pengumuman Hasil Seleksi PPDB 2026</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed mb-4">Hasil seleksi PPDB Tahun Ajaran 2026/2027 telah diumumkan. Silakan cek hasil seleksi melalui akun masing-masing.</p>
                    <a href="{{ route('landing.pengumuman-detail', ['id' => 1]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80">
                        Baca Selengkapnya
                        <svg aria-hidden="true"   class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </article>
            <article class="group bg-card rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-border">
                <div class="h-48 bg-gradient-to-br from-emerald-500 to-teal-600 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg aria-hidden="true"   class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="absolute top-4 left-4 bg-card/90 text-foreground text-xs font-semibold px-3 py-1 rounded-full">10 Jul 2026</div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-foreground mb-2 group-hover:text-primary transition-colors">Perpanjangan Masa Pendaftaran PPDB</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed mb-4">Masa pendaftaran PPDB diperpanjang hingga 31 Juli 2026. Manfaatkan kesempatan ini untuk mendaftarkan putra/putri Anda.</p>
                    <a href="{{ route('landing.pengumuman-detail', ['id' => 2]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80">
                        Baca Selengkapnya
                        <svg aria-hidden="true"   class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </article>
            <article class="group bg-card rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-border">
                <div class="h-48 bg-gradient-to-br from-purple-500 to-pink-600 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg aria-hidden="true"   class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </div>
                    <div class="absolute top-4 left-4 bg-card/90 text-foreground text-xs font-semibold px-3 py-1 rounded-full">5 Jul 2026</div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-foreground mb-2 group-hover:text-primary transition-colors">Sosialisasi PPDB Online 2026</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed mb-4">Sosialisasi PPDB Online akan dilaksanakan pada 20 Juli 2026 secara daring. Seluruh orang tua calon peserta didik diharapkan hadir.</p>
                    <a href="{{ route('landing.pengumuman-detail', ['id' => 3]) }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80">
                        Baca Selengkapnya
                        <svg aria-hidden="true"   class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="py-20 lg:py-28 bg-gradient-to-r from-primary via-primary/80 to-primary/60 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary-foreground">Siap Bergabung?</h2>
        <p class="mt-4 text-xl text-primary-foreground/80 max-w-2xl mx-auto">Daftarkan putra/putri Anda sekarang dan jadilah bagian dari generasi penerus bangsa.</p>
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('register') }}" class="px-10 py-4 bg-primary-foreground text-primary font-bold rounded-xl shadow-2xl hover:shadow-primary/30 transition-all duration-300 hover:-translate-y-1">Daftar Sekarang</a>
            <a href="{{ route('landing.kontak') }}" class="px-10 py-4 border-2 border-primary-foreground/30 text-primary-foreground font-semibold rounded-xl hover:bg-primary-foreground/10 transition-all duration-300">Hubungi Kami</a>
        </div>
    </div>
</section>

@endsection
