@extends('landing.layout')

@section('title', 'FAQ')

@section('content')

<section class="pt-32 pb-24 lg:pt-40 lg:pb-28 overflow-hidden" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="inline-flex items-center px-4 py-1.5 bg-white/15 text-white text-sm font-medium rounded-full">FAQ</p>
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mt-6">Pertanyaan Umum</h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-3xl mx-auto mt-4 leading-relaxed">Temukan jawaban atas pertanyaan yang sering diajukan tentang PPDB Online.</p>
    </div>
</section>

<section class="py-24 lg:py-32 bg-background">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
        <div class="card !p-0 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-5 text-left transition-colors hover:bg-accent/30">
                <span class="text-base font-semibold text-foreground pr-4">Apa itu PPDB Online?</span>
                <svg aria-hidden="true" class="w-4 h-4 text-muted-foreground shrink-0 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse x-cloak>
                <div class="px-6 pb-5 text-sm text-muted-foreground leading-relaxed border-t border-border pt-4">
                    PPDB Online adalah sistem Penerimaan Peserta Didik Baru yang dilakukan secara digital. Sistem ini memungkinkan calon peserta didik untuk mendaftar, mengunggah berkas, memantau proses seleksi, dan melihat hasil pengumuman secara online tanpa harus datang ke sekolah.
                </div>
            </div>
        </div>

        <div class="card !p-0 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-5 text-left transition-colors hover:bg-accent/30">
                <span class="text-base font-semibold text-foreground pr-4">Bagaimana cara mendaftar PPDB Online?</span>
                <svg aria-hidden="true" class="w-4 h-4 text-muted-foreground shrink-0 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse x-cloak>
                <div class="px-6 pb-5 text-sm text-muted-foreground leading-relaxed border-t border-border pt-4">
                    <p class="mb-3 font-medium text-foreground">Langkah-langkah pendaftaran:</p>
                    <ol class="list-decimal list-inside space-y-1.5">
                        <li>Buat akun melalui halaman <a href="{{ route('register') }}" class="text-primary hover:underline">registrasi</a></li>
                        <li>Login menggunakan email dan password yang telah didaftarkan</li>
                        <li>Lengkapi formulir pendaftaran dengan data diri calon peserta didik</li>
                        <li>Pilih jalur pendaftaran yang sesuai</li>
                        <li>Pilih sekolah tujuan</li>
                        <li>Unggah dokumen persyaratan yang diminta</li>
                        <li>Submit pendaftaran</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card !p-0 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-5 text-left transition-colors hover:bg-accent/30">
                <span class="text-base font-semibold text-foreground pr-4">Apa saja dokumen yang diperlukan?</span>
                <svg aria-hidden="true" class="w-4 h-4 text-muted-foreground shrink-0 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse x-cloak>
                <div class="px-6 pb-5 text-sm text-muted-foreground leading-relaxed border-t border-border pt-4">
                    <p class="mb-3 font-medium text-foreground">Dokumen yang umumnya diperlukan:</p>
                    <ul class="list-disc list-inside space-y-1.5">
                        <li>Kartu Keluarga (KK)</li>
                        <li>Akta Kelahiran</li>
                        <li>Ijazah / SKHUN</li>
                        <li>Pas foto terbaru (3x4 atau 4x6)</li>
                        <li>NISN (Nomor Induk Siswa Nasional)</li>
                        <li>Dokumen tambahan sesuai jalur (SKTM, sertifikat prestasi, dll)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card !p-0 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-5 text-left transition-colors hover:bg-accent/30">
                <span class="text-base font-semibold text-foreground pr-4">Berapa biaya pendaftaran PPDB Online?</span>
                <svg aria-hidden="true" class="w-4 h-4 text-muted-foreground shrink-0 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse x-cloak>
                <div class="px-6 pb-5 text-sm text-muted-foreground leading-relaxed border-t border-border pt-4">
                    Pendaftaran PPDB Online <strong class="text-foreground">tidak dipungut biaya alias gratis</strong>. PPDB Online diselenggarakan oleh pemerintah untuk memberikan akses pendidikan yang seluas-luasnya. Waspadai segala bentuk pungutan liar yang mengatasnamakan PPDB.
                </div>
            </div>
        </div>

        <div class="card !p-0 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-5 text-left transition-colors hover:bg-accent/30">
                <span class="text-base font-semibold text-foreground pr-4">Apa saja jalur pendaftaran yang tersedia?</span>
                <svg aria-hidden="true" class="w-4 h-4 text-muted-foreground shrink-0 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse x-cloak>
                <div class="px-6 pb-5 text-sm text-muted-foreground leading-relaxed border-t border-border pt-4">
                    <p class="mb-3 font-medium text-foreground">Terdapat 4 jalur pendaftaran:</p>
                    <ul class="list-disc list-inside space-y-1.5">
                        <li><strong>Jalur Zonasi</strong> (50%) &mdash; berdasarkan domisili di dalam zonasi sekolah</li>
                        <li><strong>Jalur Afirmasi</strong> (15%) &mdash; untuk keluarga tidak mampu</li>
                        <li><strong>Jalur Perpindahan Tugas</strong> (5%) &mdash; perpindahan domisili orang tua</li>
                        <li><strong>Jalur Prestasi</strong> (30%) &mdash; prestasi akademik/non-akademik</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 lg:py-32" style="background: linear-gradient(to right, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-3xl sm:text-4xl font-bold text-white">Masih Punya Pertanyaan?</h3>
        <p class="text-white/80 max-w-2xl mx-auto mt-3">Hubungi panitia PPDB untuk pertanyaan lebih lanjut.</p>
        <a href="{{ route('landing.kontak') }}" class="btn bg-white text-primary hover:bg-white/90 shadow-lg shadow-black/10 px-8 py-3 mt-8 inline-flex">Hubungi Kami</a>
    </div>
</section>

@endsection
