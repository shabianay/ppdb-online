@extends('landing.layout')

@section('title', 'Jalur Pendaftaran')

@section('content')

<section class="pt-32 pb-24 lg:pt-40 lg:pb-28 overflow-hidden" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="inline-flex items-center px-4 py-1.5 bg-white/15 text-white text-sm font-medium rounded-full">Jalur Pendaftaran</p>
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mt-6">Jalur Pendaftaran PPDB</h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-3xl mx-auto mt-4 leading-relaxed">Pilih jalur pendaftaran yang sesuai dengan kriteria dan kebutuhan Anda.</p>
    </div>
</section>

<section class="py-24 lg:py-32 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="card">
            <div class="flex flex-col sm:flex-row items-start gap-5">
                <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 text-primary">
                    <svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap items-center gap-3 mb-1">
                        <h3 class="text-2xl font-bold text-foreground">Jalur Zonasi</h3>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-primary/10 text-primary">Kuota 50%</span>
                    </div>
                    <p class="text-muted-foreground leading-relaxed">Jalur pendaftaran berdasarkan domisili calon peserta didik yang berada di dalam zonasi sekolah yang telah ditetapkan.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-1.5 mt-4">
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Domisili di dalam zonasi sekolah</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Usia sesuai ketentuan jenjang</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Memiliki NISN yang valid</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>KK minimal 1 tahun</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex flex-col sm:flex-row items-start gap-5">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 flex items-center justify-center shrink-0 text-emerald-600">
                    <svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap items-center gap-3 mb-1">
                        <h3 class="text-2xl font-bold text-foreground">Jalur Afirmasi</h3>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-600">Kuota 15%</span>
                    </div>
                    <p class="text-muted-foreground leading-relaxed">Jalur pendaftaran khusus untuk peserta didik dari keluarga tidak mampu secara ekonomi yang dibuktikan dengan surat keterangan resmi.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-1.5 mt-4">
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Memiliki SKTM dari kelurahan</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Terdaftar di DTKS</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Memiliki NISN yang valid</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>KK dan akta kelahiran</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex flex-col sm:flex-row items-start gap-5">
                <div class="w-12 h-12 rounded-xl bg-violet-500/10 flex items-center justify-center shrink-0 text-violet-600">
                    <svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap items-center gap-3 mb-1">
                        <h3 class="text-2xl font-bold text-foreground">Jalur Perpindahan Tugas</h3>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-violet-500/10 text-violet-600">Kuota 5%</span>
                    </div>
                    <p class="text-muted-foreground leading-relaxed">Jalur pendaftaran untuk peserta didik yang pindah domisili karena perpindahan tugas orang tua atau wali.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-1.5 mt-4">
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Surat penugasan orang tua</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>KK dan akta kelahiran</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Memiliki NISN yang valid</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Domisili baru sesuai lokasi sekolah</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex flex-col sm:flex-row items-start gap-5">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center shrink-0 text-amber-600">
                    <svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap items-center gap-3 mb-1">
                        <h3 class="text-2xl font-bold text-foreground">Jalur Prestasi</h3>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-amber-500/10 text-amber-600">Kuota 30%</span>
                    </div>
                    <p class="text-muted-foreground leading-relaxed">Jalur pendaftaran untuk peserta didik yang memiliki prestasi di bidang akademik maupun non-akademik yang diakui.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-1.5 mt-4">
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Prestasi akademik (juara kelas, olimpiade)</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Prestasi non-akademik (olahraga, seni)</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Sertifikat/piagam prestasi berlaku</p>
                        <p class="text-sm text-muted-foreground flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>Memiliki NISN yang valid</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 lg:py-32 bg-muted/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="section-label">Perbandingan</p>
        <h2 class="section-title">Perbandingan Jalur Pendaftaran</h2>
        <p class="section-desc">Tabel perbandingan antar jalur pendaftaran untuk membantu Anda memilih jalur yang tepat.</p>
        <div class="mt-12 overflow-x-auto rounded-2xl border border-border">
            <table class="w-full text-left border-collapse" role="table" aria-label="Perbandingan jalur pendaftaran">
                <caption class="sr-only">Perbandingan antar jalur pendaftaran PPDB</caption>
                <thead>
                    <tr class="bg-muted/50">
                        <th class="p-4 font-semibold text-foreground text-sm" scope="col">Kriteria</th>
                        <th class="p-4 font-semibold text-primary text-sm" scope="col">Zonasi</th>
                        <th class="p-4 font-semibold text-emerald-600 text-sm" scope="col">Afirmasi</th>
                        <th class="p-4 font-semibold text-violet-600 text-sm" scope="col">Perpindahan</th>
                        <th class="p-4 font-semibold text-amber-600 text-sm" scope="col">Prestasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <tr class="hover:bg-muted/20 transition-colors"><td class="p-4 font-medium text-foreground text-sm">Kuota</td><td class="p-4 text-muted-foreground text-sm">50%</td><td class="p-4 text-muted-foreground text-sm">15%</td><td class="p-4 text-muted-foreground text-sm">5%</td><td class="p-4 text-muted-foreground text-sm">30%</td></tr>
                    <tr class="hover:bg-muted/20 transition-colors"><td class="p-4 font-medium text-foreground text-sm">Domisili</td><td class="p-4 text-muted-foreground text-sm">Wajib sesuai zonasi</td><td class="p-4 text-muted-foreground text-sm">Tidak diutamakan</td><td class="p-4 text-muted-foreground text-sm">Domisili baru</td><td class="p-4 text-muted-foreground text-sm">Tidak diutamakan</td></tr>
                    <tr class="hover:bg-muted/20 transition-colors"><td class="p-4 font-medium text-foreground text-sm">Prestasi</td><td class="p-4 text-muted-foreground text-sm">Tidak diwajibkan</td><td class="p-4 text-muted-foreground text-sm">Tidak diwajibkan</td><td class="p-4 text-muted-foreground text-sm">Tidak diwajibkan</td><td class="p-4 text-muted-foreground text-sm">Wajib</td></tr>
                    <tr class="hover:bg-muted/20 transition-colors"><td class="p-4 font-medium text-foreground text-sm">Ekonomi</td><td class="p-4 text-muted-foreground text-sm">&mdash;</td><td class="p-4 text-muted-foreground text-sm">Wajib SKTM/DTKS</td><td class="p-4 text-muted-foreground text-sm">&mdash;</td><td class="p-4 text-muted-foreground text-sm">&mdash;</td></tr>
                    <tr class="hover:bg-muted/20 transition-colors"><td class="p-4 font-medium text-foreground border-b-0 text-sm">Seleksi</td><td class="p-4 text-muted-foreground border-b-0 text-sm">Berdasarkan jarak</td><td class="p-4 text-muted-foreground border-b-0 text-sm">Verifikasi ekonomi</td><td class="p-4 text-muted-foreground border-b-0 text-sm">Verifikasi perpindahan</td><td class="p-4 text-muted-foreground border-b-0 text-sm">Nilai prestasi</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="py-24 lg:py-32" style="background: linear-gradient(to right, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-3xl sm:text-4xl font-bold text-white">Tentukan Pilihan Anda</h3>
        <p class="text-white/80 max-w-2xl mx-auto mt-3">Pilih jalur yang sesuai dengan kriteria dan segera daftarkan diri Anda.</p>
        <a href="{{ route('register') }}" class="btn bg-white text-primary hover:bg-white/90 shadow-lg shadow-black/10 px-8 py-3 mt-8 inline-flex">Daftar Sekarang</a>
    </div>
</section>

@endsection
