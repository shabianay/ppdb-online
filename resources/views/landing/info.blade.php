@extends('landing.layout')

@section('title', 'Info PPDB')

@section('content')

<section class="relative pt-32 pb-20 lg:pt-40 lg:pb-24 bg-gradient-to-br from-primary via-primary/80 to-primary/60 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-primary-foreground/10 text-primary-foreground/90 rounded-full text-sm font-medium backdrop-blur border border-primary-foreground/10 mb-4">Info PPDB</span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-primary-foreground">Informasi PPDB Online</h1>
        <p class="mt-4 text-lg sm:text-xl text-primary-foreground/80 max-w-2xl mx-auto">Informasi lengkap mengenai jadwal, tahapan, dan alur pendaftaran PPDB Online.</p>
    </div>
</section>

<section class="py-20 lg:py-28 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Jadwal</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Jadwal Pelaksanaan PPDB</h2>
            <p class="mt-4 text-muted-foreground leading-relaxed">Berikut adalah jadwal lengkap pelaksanaan PPDB Online Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }}.</p>
        </div>
        <div class="mt-16 max-w-4xl mx-auto">
            <div class="space-y-4">
                <div class="flex items-center p-5 bg-card rounded-xl border border-border hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="font-bold text-foreground">Pendaftaran Online</h3>
                        <p class="text-sm text-muted-foreground">1 Juli - 31 Juli {{ date('Y') }}</p>
                    </div>
                    <span class="px-3 py-1 bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-semibold rounded-full shrink-0">Berlangsung</span>
                </div>
                <div class="flex items-center p-5 bg-card rounded-xl border border-border hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 rounded-xl bg-amber-500/10 flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="font-bold text-foreground">Verifikasi Berkas</h3>
                        <p class="text-sm text-muted-foreground">1 Juli - 5 Agustus {{ date('Y') }}</p>
                    </div>
                    <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full shrink-0">Akan Datang</span>
                </div>
                <div class="flex items-center p-5 bg-card rounded-xl border border-border hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 rounded-xl bg-purple-500/10 flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="font-bold text-foreground">Seleksi & Pengolahan Data</h3>
                        <p class="text-sm text-muted-foreground">6 - 15 Agustus {{ date('Y') }}</p>
                    </div>
                    <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full shrink-0">Akan Datang</span>
                </div>
                <div class="flex items-center p-5 bg-card rounded-xl border border-border hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 rounded-xl bg-green-500/10 flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="font-bold text-foreground">Pengumuman Hasil Seleksi</h3>
                        <p class="text-sm text-muted-foreground">20 Agustus {{ date('Y') }}</p>
                    </div>
                    <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full shrink-0">Akan Datang</span>
                </div>
                <div class="flex items-center p-5 bg-card rounded-xl border border-border hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 rounded-xl bg-destructive/10 flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-destructive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2a2 2 0 012-2h10a2 2 0 012 2zm0-8V6a2 2 0 00-2-2H5a2 2 0 00-2 2v2a2 2 0 002 2h10a2 2 0 002-2z"/></svg>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="font-bold text-foreground">Daftar Ulang</h3>
                        <p class="text-sm text-muted-foreground">21 - 31 Agustus {{ date('Y') }}</p>
                    </div>
                    <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full shrink-0">Akan Datang</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 lg:py-28 bg-muted/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Tahapan</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Tahapan PPDB Online</h2>
            <p class="mt-4 text-muted-foreground leading-relaxed">Ikuti tahapan berikut untuk menyelesaikan proses pendaftaran PPDB Online.</p>
        </div>
        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="relative p-8 bg-card rounded-2xl shadow-lg border border-border">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-xl bg-gradient-to-br from-primary to-primary/80 flex items-center justify-center text-primary-foreground font-bold text-lg shadow-lg">1</div>
                <div class="mt-4">
                    <h3 class="text-lg font-bold text-foreground mb-2">Buat Akun</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">Lakukan registrasi akun dengan mengisi data diri lengkap dan valid.</p>
                </div>
            </div>
            <div class="relative p-8 bg-card rounded-2xl shadow-lg border border-border">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white font-bold text-lg shadow-lg">2</div>
                <div class="mt-4">
                    <h3 class="text-lg font-bold text-foreground mb-2">Isi Formulir</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">Lengkapi formulir pendaftaran dengan data calon peserta didik.</p>
                </div>
            </div>
            <div class="relative p-8 bg-card rounded-2xl shadow-lg border border-border">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-lg">3</div>
                <div class="mt-4">
                    <h3 class="text-lg font-bold text-foreground mb-2">Unggah Berkas</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">Unggah dokumen persyaratan yang diperlukan sesuai jalur yang dipilih.</p>
                </div>
            </div>
            <div class="relative p-8 bg-card rounded-2xl shadow-lg border border-border">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center text-white font-bold text-lg shadow-lg">4</div>
                <div class="mt-4">
                    <h3 class="text-lg font-bold text-foreground mb-2">Submit & Tunggu</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">Submit pendaftaran dan tunggu hasil seleksi yang akan diumumkan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 lg:py-28 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-block px-4 py-1.5 bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 rounded-full text-sm font-medium mb-4">Alur Pendaftaran</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Alur Pendaftaran PPDB</h2>
            <p class="mt-4 text-muted-foreground leading-relaxed">Berikut adalah alur lengkap pendaftaran PPDB Online dari awal hingga akhir.</p>
        </div>
        <div class="mt-16 max-w-4xl mx-auto">
            <div class="relative">
                <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-primary via-primary/60 to-primary/40 hidden md:block"></div>
                <div class="space-y-12">
                    <div class="relative flex flex-col md:flex-row items-start gap-6">
                        <div class="hidden md:flex w-16 h-16 rounded-2xl bg-gradient-to-br from-primary to-primary/80 items-center justify-center text-primary-foreground font-bold text-xl shadow-lg shrink-0 z-10">1</div>
                        <div class="md:hidden w-12 h-12 rounded-xl bg-gradient-to-br from-primary to-primary/80 flex items-center justify-center text-primary-foreground font-bold shadow-lg shrink-0 z-10">1</div>
                        <div class="flex-1 bg-card p-6 rounded-2xl border border-border">
                            <h3 class="text-xl font-bold text-foreground">Registrasi Akun</h3>
                            <p class="mt-2 text-muted-foreground leading-relaxed">Calon peserta didik melakukan registrasi akun melalui website PPDB Online dengan mengisi data diri seperti nama lengkap, NISN, email, dan nomor telepon yang aktif.</p>
                        </div>
                    </div>
                    <div class="relative flex flex-col md:flex-row items-start gap-6">
                        <div class="hidden md:flex w-16 h-16 rounded-2xl bg-gradient-to-br from-green-500 to-emerald-600 items-center justify-center text-white font-bold text-xl shadow-lg shrink-0 z-10">2</div>
                        <div class="md:hidden w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white font-bold shadow-lg shrink-0 z-10">2</div>
                        <div class="flex-1 bg-card p-6 rounded-2xl border border-border">
                            <h3 class="text-xl font-bold text-foreground">Login & Isi Data Pendaftaran</h3>
                            <p class="mt-2 text-muted-foreground leading-relaxed">Login menggunakan akun yang telah dibuat, kemudian mengisi formulir pendaftaran secara lengkap termasuk memilih jalur pendaftaran dan sekolah tujuan.</p>
                        </div>
                    </div>
                    <div class="relative flex flex-col md:flex-row items-start gap-6">
                        <div class="hidden md:flex w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 items-center justify-center text-white font-bold text-xl shadow-lg shrink-0 z-10">3</div>
                        <div class="md:hidden w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-lg shrink-0 z-10">3</div>
                        <div class="flex-1 bg-card p-6 rounded-2xl border border-border">
                            <h3 class="text-xl font-bold text-foreground">Unggah Dokumen Persyaratan</h3>
                            <p class="mt-2 text-muted-foreground leading-relaxed">Unggah dokumen persyaratan yang diminta seperti scan KK, akta kelahiran, ijazah/SKHUN, pas foto, dan dokumen pendukung lainnya sesuai jalur yang dipilih.</p>
                        </div>
                    </div>
                    <div class="relative flex flex-col md:flex-row items-start gap-6">
                        <div class="hidden md:flex w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 items-center justify-center text-white font-bold text-xl shadow-lg shrink-0 z-10">4</div>
                        <div class="md:hidden w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center text-white font-bold shadow-lg shrink-0 z-10">4</div>
                        <div class="flex-1 bg-card p-6 rounded-2xl border border-border">
                            <h3 class="text-xl font-bold text-foreground">Verifikasi & Validasi Berkas</h3>
                            <p class="mt-2 text-muted-foreground leading-relaxed">Panitia PPDB akan melakukan verifikasi dan validasi terhadap berkas yang telah diunggah. Jika berkas tidak lengkap atau tidak valid, calon peserta didik akan diminta melengkapi.</p>
                        </div>
                    </div>
                    <div class="relative flex flex-col md:flex-row items-start gap-6">
                        <div class="hidden md:flex w-16 h-16 rounded-2xl bg-gradient-to-br from-rose-500 to-pink-600 items-center justify-center text-white font-bold text-xl shadow-lg shrink-0 z-10">5</div>
                        <div class="md:hidden w-12 h-12 rounded-xl bg-gradient-to-br from-rose-500 to-pink-600 flex items-center justify-center text-white font-bold shadow-lg shrink-0 z-10">5</div>
                        <div class="flex-1 bg-card p-6 rounded-2xl border border-border">
                            <h3 class="text-xl font-bold text-foreground">Proses Seleksi</h3>
                            <p class="mt-2 text-muted-foreground leading-relaxed">Panitia melakukan proses seleksi berdasarkan jalur yang dipilih dan kriteria yang telah ditetapkan. Proses seleksi dilakukan secara transparan dan akuntabel.</p>
                        </div>
                    </div>
                    <div class="relative flex flex-col md:flex-row items-start gap-6">
                        <div class="hidden md:flex w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-500 to-cyan-600 items-center justify-center text-white font-bold text-xl shadow-lg shrink-0 z-10">6</div>
                        <div class="md:hidden w-12 h-12 rounded-xl bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center text-white font-bold shadow-lg shrink-0 z-10">6</div>
                        <div class="flex-1 bg-card p-6 rounded-2xl border border-border">
                            <h3 class="text-xl font-bold text-foreground">Pengumuman Hasil & Daftar Ulang</h3>
                            <p class="mt-2 text-muted-foreground leading-relaxed">Hasil seleksi akan diumumkan melalui website dan akun masing-masing. Peserta yang lolos wajib melakukan daftar ulang sesuai jadwal yang telah ditentukan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gradient-to-r from-primary to-primary/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-2xl sm:text-3xl font-bold text-primary-foreground">Siap Mendaftar?</h3>
        <p class="mt-2 text-primary-foreground/80">Jangan lewatkan kesempatan untuk bergabung dengan sekolah pilihan Anda.</p>
        <a href="{{ route('register') }}" class="inline-block mt-6 px-8 py-3 bg-primary-foreground text-primary font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">Daftar Sekarang</a>
    </div>
</section>

@endsection
