@extends('landing.layout')

@section('title', 'Info PPDB')

@section('content')

<section class="pt-32 pb-24 lg:pt-40 lg:pb-28 overflow-hidden" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="inline-flex items-center px-4 py-1.5 bg-white/15 text-white text-sm font-medium rounded-full">Info PPDB</p>
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mt-6">Informasi PPDB Online</h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-3xl mx-auto mt-4 leading-relaxed">Informasi lengkap mengenai jadwal, tahapan, dan alur pendaftaran PPDB Online.</p>
    </div>
</section>

<section class="py-24 lg:py-32 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="section-label">Jadwal</p>
        <h2 class="section-title">Jadwal Pelaksanaan PPDB</h2>
        <p class="section-desc">Berikut adalah jadwal lengkap pelaksanaan PPDB Online Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }}.</p>
        <div class="max-w-3xl mx-auto mt-16 space-y-4">
            <div class="flex items-center gap-5 p-5 card">
                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 text-primary">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-foreground">Pendaftaran Online</p>
                    <p class="text-sm text-muted-foreground">1 Juli &mdash; 31 Juli {{ date('Y') }}</p>
                </div>
                <span class="text-xs font-medium px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-600 shrink-0">Berlangsung</span>
            </div>
            <div class="flex items-center gap-5 p-5 card">
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 flex items-center justify-center shrink-0 text-amber-600">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-foreground">Verifikasi Berkas</p>
                    <p class="text-sm text-muted-foreground">1 Juli &mdash; 5 Agustus {{ date('Y') }}</p>
                </div>
                <span class="text-xs font-medium px-3 py-1 rounded-full bg-muted/50 text-muted-foreground shrink-0">Akan Datang</span>
            </div>
            <div class="flex items-center gap-5 p-5 card">
                <div class="w-10 h-10 rounded-xl bg-violet-500/10 flex items-center justify-center shrink-0 text-violet-600">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-foreground">Seleksi &amp; Pengolahan Data</p>
                    <p class="text-sm text-muted-foreground">6 &mdash; 15 Agustus {{ date('Y') }}</p>
                </div>
                <span class="text-xs font-medium px-3 py-1 rounded-full bg-muted/50 text-muted-foreground shrink-0">Akan Datang</span>
            </div>
            <div class="flex items-center gap-5 p-5 card">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center shrink-0 text-emerald-600">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-foreground">Pengumuman Hasil Seleksi</p>
                    <p class="text-sm text-muted-foreground">20 Agustus {{ date('Y') }}</p>
                </div>
                <span class="text-xs font-medium px-3 py-1 rounded-full bg-muted/50 text-muted-foreground shrink-0">Akan Datang</span>
            </div>
            <div class="flex items-center gap-5 p-5 card">
                <div class="w-10 h-10 rounded-xl bg-red-500/10 flex items-center justify-center shrink-0 text-red-600">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2a2 2 0 012-2h10a2 2 0 012 2zm0-8V6a2 2 0 00-2-2H5a2 2 0 00-2 2v2a2 2 0 002 2h10a2 2 0 002-2z"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-foreground">Daftar Ulang</p>
                    <p class="text-sm text-muted-foreground">21 &mdash; 31 Agustus {{ date('Y') }}</p>
                </div>
                <span class="text-xs font-medium px-3 py-1 rounded-full bg-muted/50 text-muted-foreground shrink-0">Akan Datang</span>
            </div>
        </div>
    </div>
</section>

<section class="py-24 lg:py-32 bg-muted/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="section-label">Tahapan</p>
        <h2 class="section-title">Tahapan PPDB Online</h2>
        <p class="section-desc">Ikuti tahapan berikut untuk menyelesaikan proses pendaftaran PPDB Online.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-16">
            <div class="card relative pt-14">
                <span class="absolute top-6 left-8 w-9 h-9 rounded-xl bg-primary flex items-center justify-center text-primary-foreground font-bold text-sm shadow-sm">1</span>
                <h3 class="text-lg font-bold text-foreground mb-2">Buat Akun</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Lakukan registrasi akun dengan mengisi data diri lengkap dan valid.</p>
            </div>
            <div class="card relative pt-14">
                <span class="absolute top-6 left-8 w-9 h-9 rounded-xl bg-emerald-500 flex items-center justify-center text-white font-bold text-sm shadow-sm">2</span>
                <h3 class="text-lg font-bold text-foreground mb-2">Isi Formulir</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Lengkapi formulir pendaftaran dengan data calon peserta didik.</p>
            </div>
            <div class="card relative pt-14">
                <span class="absolute top-6 left-8 w-9 h-9 rounded-xl bg-violet-500 flex items-center justify-center text-white font-bold text-sm shadow-sm">3</span>
                <h3 class="text-lg font-bold text-foreground mb-2">Unggah Berkas</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Unggah dokumen persyaratan yang diperlukan sesuai jalur yang dipilih.</p>
            </div>
            <div class="card relative pt-14">
                <span class="absolute top-6 left-8 w-9 h-9 rounded-xl bg-amber-500 flex items-center justify-center text-white font-bold text-sm shadow-sm">4</span>
                <h3 class="text-lg font-bold text-foreground mb-2">Submit &amp; Tunggu</h3>
                <p class="text-sm text-muted-foreground leading-relaxed">Submit pendaftaran dan tunggu hasil seleksi yang akan diumumkan.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 lg:py-32 bg-background">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="section-label">Alur Pendaftaran</p>
        <h2 class="section-title">Alur Pendaftaran PPDB</h2>
        <p class="section-desc">Berikut adalah alur lengkap pendaftaran PPDB Online dari awal hingga akhir.</p>
        <div class="mt-16 relative">
            <div class="absolute left-5 top-0 bottom-0 w-px bg-border hidden md:block"></div>
            <div class="space-y-12">
                <div class="relative pl-14 md:pl-16">
                    <span class="absolute left-3 md:left-3.5 top-1 w-5 h-5 rounded-full bg-primary border-2 border-background flex items-center justify-center"><span class="w-1.5 h-1.5 rounded-full bg-primary-foreground"></span></span>
                    <h3 class="text-xl font-bold text-foreground">Registrasi Akun</h3>
                    <p class="mt-2 text-sm text-muted-foreground leading-relaxed">Calon peserta didik melakukan registrasi akun melalui website PPDB Online dengan mengisi data diri lengkap dan valid.</p>
                </div>
                <div class="relative pl-14 md:pl-16">
                    <span class="absolute left-3 md:left-3.5 top-1 w-5 h-5 rounded-full bg-emerald-500 border-2 border-background flex items-center justify-center"><span class="w-1.5 h-1.5 rounded-full bg-white"></span></span>
                    <h3 class="text-xl font-bold text-foreground">Login &amp; Isi Data Pendaftaran</h3>
                    <p class="mt-2 text-sm text-muted-foreground leading-relaxed">Login menggunakan akun yang telah dibuat, kemudian mengisi formulir pendaftaran secara lengkap termasuk memilih jalur pendaftaran dan sekolah tujuan.</p>
                </div>
                <div class="relative pl-14 md:pl-16">
                    <span class="absolute left-3 md:left-3.5 top-1 w-5 h-5 rounded-full bg-violet-500 border-2 border-background flex items-center justify-center"><span class="w-1.5 h-1.5 rounded-full bg-white"></span></span>
                    <h3 class="text-xl font-bold text-foreground">Unggah Dokumen Persyaratan</h3>
                    <p class="mt-2 text-sm text-muted-foreground leading-relaxed">Unggah dokumen persyaratan yang diminta seperti scan KK, akta kelahiran, ijazah/SKHUN, pas foto, dan dokumen pendukung lainnya sesuai jalur yang dipilih.</p>
                </div>
                <div class="relative pl-14 md:pl-16">
                    <span class="absolute left-3 md:left-3.5 top-1 w-5 h-5 rounded-full bg-amber-500 border-2 border-background flex items-center justify-center"><span class="w-1.5 h-1.5 rounded-full bg-white"></span></span>
                    <h3 class="text-xl font-bold text-foreground">Verifikasi &amp; Validasi Berkas</h3>
                    <p class="mt-2 text-sm text-muted-foreground leading-relaxed">Panitia PPDB akan melakukan verifikasi dan validasi terhadap berkas yang telah diunggah. Jika berkas tidak lengkap atau tidak valid, calon peserta didik akan diminta melengkapi.</p>
                </div>
                <div class="relative pl-14 md:pl-16">
                    <span class="absolute left-3 md:left-3.5 top-1 w-5 h-5 rounded-full bg-rose-500 border-2 border-background flex items-center justify-center"><span class="w-1.5 h-1.5 rounded-full bg-white"></span></span>
                    <h3 class="text-xl font-bold text-foreground">Proses Seleksi</h3>
                    <p class="mt-2 text-sm text-muted-foreground leading-relaxed">Panitia melakukan proses seleksi berdasarkan jalur yang dipilih dan kriteria yang telah ditetapkan. Proses seleksi dilakukan secara transparan dan akuntabel.</p>
                </div>
                <div class="relative pl-14 md:pl-16">
                    <span class="absolute left-3 md:left-3.5 top-1 w-5 h-5 rounded-full bg-teal-500 border-2 border-background flex items-center justify-center"><span class="w-1.5 h-1.5 rounded-full bg-white"></span></span>
                    <h3 class="text-xl font-bold text-foreground">Pengumuman Hasil &amp; Daftar Ulang</h3>
                    <p class="mt-2 text-sm text-muted-foreground leading-relaxed">Hasil seleksi akan diumumkan melalui website dan akun masing-masing. Peserta yang lolos wajib melakukan daftar ulang sesuai jadwal yang telah ditentukan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 lg:py-32" style="background: linear-gradient(to right, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-3xl sm:text-4xl font-bold text-white">Siap Mendaftar?</h3>
        <p class="text-white/80 max-w-2xl mx-auto mt-3">Jangan lewatkan kesempatan untuk bergabung dengan sekolah pilihan Anda.</p>
        <a href="{{ route('register') }}" class="btn bg-white text-primary hover:bg-white/90 shadow-lg shadow-black/10 px-8 py-3 mt-8 inline-flex">Daftar Sekarang</a>
    </div>
</section>

@endsection
