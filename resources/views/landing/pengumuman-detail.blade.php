@extends('landing.layout')

@section('title', 'Detail Pengumuman')

@section('content')

<section class="pt-32 pb-20 lg:pt-40 lg:pb-24 overflow-hidden" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('landing.pengumuman') }}" class="inline-flex items-center text-white/70 hover:text-white transition-colors mb-6 text-sm group">
            <svg aria-hidden="true" class="w-4 h-4 mr-1.5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
        <div class="flex flex-wrap items-center gap-3 mb-4">
            <span class="text-xs font-medium px-3 py-1 rounded-full bg-white/15 text-white">Pengumuman</span>
            <span class="text-sm text-white/60">15 Juli 2026</span>
            <span class="text-sm text-white/60">Oleh: Admin</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight tracking-tight">Pengumuman Hasil Seleksi PPDB 2026</h1>
    </div>
</section>

<section class="py-24 lg:py-32 bg-background">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <div class="rounded-2xl overflow-hidden mb-8 h-64 flex items-center justify-center" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
                    <svg aria-hidden="true" class="w-20 h-20 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>

                <div class="prose prose-gray dark:prose-invert max-w-none">
                    <p class="text-lg leading-relaxed text-foreground">Dengan memanjatkan puji syukur kehadirat Tuhan Yang Maha Esa, Panitia Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027 mengumumkan hasil seleksi PPDB Online.</p>

                    <h2 class="text-2xl font-bold text-foreground mt-10">Hasil Seleksi</h2>
                    <p class="text-muted-foreground">Berdasarkan hasil rapat pleno Panitia PPDB yang dilaksanakan pada tanggal 15 Agustus 2026, dengan ini diumumkan calon peserta didik yang dinyatakan <strong>LULUS</strong> seleksi PPDB Tahun Ajaran 2026/2027.</p>

                    <div class="bg-primary/5 border-l-4 border-primary p-5 my-8 rounded-r-xl">
                        <h3 class="font-bold text-primary mb-2">Cara Melihat Hasil Seleksi</h3>
                        <ol class="list-decimal list-inside space-y-1 text-primary/80 text-sm">
                            <li>Login ke akun PPDB Online masing-masing</li>
                            <li>Pilih menu "Hasil Seleksi" pada dashboard</li>
                            <li>Cetak surat keterangan lulus jika dinyatakan lulus</li>
                        </ol>
                    </div>

                    <h2 class="text-2xl font-bold text-foreground mt-10">Ketentuan Daftar Ulang</h2>
                    <p class="text-muted-foreground">Bagi calon peserta didik yang dinyatakan lulus, wajib melakukan daftar ulang pada:</p>
                    <ul class="list-disc list-inside space-y-1 text-muted-foreground mt-3">
                        <li>Tanggal: 21 &mdash; 31 Agustus 2026</li>
                        <li>Waktu: 08.00 &mdash; 14.00 WIB</li>
                        <li>Tempat: Sekolah tujuan masing-masing</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-foreground mt-10">Persyaratan Daftar Ulang</h2>
                    <ul class="list-disc list-inside space-y-1 text-muted-foreground mt-3">
                        <li>Membawa dokumen asli KK, Akta Kelahiran, dan Ijazah/SKHUN</li>
                        <li>Membawa fotokopi dokumen sebanyak 2 lembar</li>
                        <li>Pas foto 3x4 sebanyak 4 lembar</li>
                        <li>Membawa surat keterangan lulus dari hasil cetak PPDB Online</li>
                    </ul>

                    <div class="bg-amber-500/10 border-l-4 border-amber-500 p-5 my-8 rounded-r-xl">
                        <h3 class="font-bold text-amber-600 mb-2">Perhatian</h3>
                        <p class="text-amber-700 text-sm">Calon peserta didik yang tidak melakukan daftar ulang sesuai jadwal yang telah ditentukan dianggap mengundurkan diri dan kuotanya akan dialihkan kepada calon peserta didik lain.</p>
                    </div>

                    <p class="text-muted-foreground mt-8">Demikian pengumuman ini disampaikan untuk diketahui dan dilaksanakan dengan penuh tanggung jawab. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>

                    <div class="mt-12 pt-8 border-t border-border">
                        <p class="text-foreground font-semibold">Hormat Kami,</p>
                        <p class="text-muted-foreground mt-1">Panitia PPDB Online</p>
                        <p class="text-foreground font-bold mt-6">Kepala Sekolah</p>
                        <div class="mt-16">
                            <p class="text-foreground font-semibold">Dr. H. Ahmad Syarifuddin, M.Pd.</p>
                            <p class="text-muted-foreground text-sm">NIP. 196512311990011001</p>
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex items-center gap-3 py-5 border-t border-b border-border">
                    <span class="text-sm text-muted-foreground">Bagikan:</span>
                    <a href="#" class="w-8 h-8 rounded-lg bg-muted flex items-center justify-center text-muted-foreground hover:bg-primary hover:text-primary-foreground transition-colors" aria-label="Facebook">
                        <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-lg bg-muted flex items-center justify-center text-muted-foreground hover:bg-primary hover:text-primary-foreground transition-colors" aria-label="Twitter">
                        <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-lg bg-muted flex items-center justify-center text-muted-foreground hover:bg-primary hover:text-primary-foreground transition-colors" aria-label="LinkedIn">
                        <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="card">
                    <h3 class="font-bold text-foreground mb-4">Pengumuman Lainnya</h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('landing.pengumuman-detail', ['id' => 2]) }}" class="group block"><span class="text-xs text-muted-foreground">10 Jul 2026</span><p class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Perpanjangan Masa Pendaftaran PPDB</p><p class="text-xs text-muted-foreground mt-1">Masa pendaftaran PPDB diperpanjang hingga 31 Juli 2026...</p></a></li>
                        <li><a href="{{ route('landing.pengumuman-detail', ['id' => 3]) }}" class="group block"><span class="text-xs text-muted-foreground">5 Jul 2026</span><p class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Sosialisasi PPDB Online 2026</p><p class="text-xs text-muted-foreground mt-1">Sosialisasi PPDB Online akan dilaksanakan pada 20 Juli 2026...</p></a></li>
                        <li><a href="{{ route('landing.pengumuman-detail', ['id' => 4]) }}" class="group block"><span class="text-xs text-muted-foreground">28 Jun 2026</span><p class="text-sm font-semibold text-foreground group-hover:text-primary transition-colors mt-0.5">Waspada Penipuan Mengatasnamakan PPDB</p><p class="text-xs text-muted-foreground mt-1">Dihimbau kepada seluruh masyarakat untuk waspada...</p></a></li>
                    </ul>
                    <a href="{{ route('landing.pengumuman') }}" class="inline-flex items-center text-sm font-semibold text-primary hover:text-primary/80 transition-colors mt-4">Lihat Semua &rarr;</a>
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
