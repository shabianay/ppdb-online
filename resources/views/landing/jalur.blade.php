@extends('landing.layout')

@section('title', 'Jalur Pendaftaran')

@section('content')

<section class="relative pt-32 pb-20 lg:pt-40 lg:pb-24 bg-gradient-to-br from-primary via-primary/80 to-primary/60 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-primary-foreground/10 text-primary-foreground/90 rounded-full text-sm font-medium backdrop-blur border border-primary-foreground/10 mb-4">Jalur Pendaftaran</span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-primary-foreground">Jalur Pendaftaran PPDB</h1>
        <p class="mt-4 text-lg sm:text-xl text-primary-foreground/80 max-w-2xl mx-auto">Pilih jalur pendaftaran yang sesuai dengan kriteria dan kebutuhan Anda.</p>
    </div>
</section>

<section class="py-20 lg:py-28 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-card rounded-2xl p-8 border border-border hover:shadow-xl transition-all duration-300">
                <div class="flex items-start gap-5">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary to-primary/80 flex items-center justify-center shrink-0 shadow-lg shadow-primary/25">
                        <svg aria-hidden="true"   class="w-8 h-8 text-primary-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-2xl font-bold text-foreground">Jalur Zonasi</h3>
                            <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full">Kuota 50%</span>
                        </div>
                        <p class="text-muted-foreground leading-relaxed">Jalur pendaftaran berdasarkan domisili calon peserta didik yang berada di dalam zonasi sekolah.</p>
                        <div class="mt-4 space-y-2">
                            <h4 class="font-semibold text-foreground text-sm">Persyaratan:</h4>
                            <ul class="space-y-1.5">
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Berdomisili di dalam zonasi sekolah yang ditetapkan
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Usia sesuai dengan ketentuan jenjang pendidikan
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Memiliki NISN yang valid
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Memiliki KK (Kartu Keluarga) yang diterbitkan minimal 1 tahun
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl p-8 border border-border hover:shadow-xl transition-all duration-300">
                <div class="flex items-start gap-5">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shrink-0 shadow-lg shadow-green-500/25">
                        <svg aria-hidden="true"   class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-2xl font-bold text-foreground">Jalur Afirmasi</h3>
                            <span class="px-3 py-1 bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-semibold rounded-full">Kuota 15%</span>
                        </div>
                        <p class="text-muted-foreground leading-relaxed">Jalur pendaftaran khusus untuk peserta didik dari keluarga tidak mampu secara ekonomi.</p>
                        <div class="mt-4 space-y-2">
                            <h4 class="font-semibold text-foreground text-sm">Persyaratan:</h4>
                            <ul class="space-y-1.5">
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Memiliki surat keterangan tidak mampu (SKTM) dari kelurahan/desa
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Terdaftar dalam Data Terpadu Kesejahteraan Sosial (DTKS)
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Memiliki NISN yang valid
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    KK dan akta kelahiran
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl p-8 border border-border hover:shadow-xl transition-all duration-300">
                <div class="flex items-start gap-5">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center shrink-0 shadow-lg shadow-purple-500/25">
                        <svg aria-hidden="true"   class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-2xl font-bold text-foreground">Jalur Perpindahan Tugas</h3>
                            <span class="px-3 py-1 bg-purple-500/10 text-purple-600 dark:text-purple-400 text-xs font-semibold rounded-full">Kuota 5%</span>
                        </div>
                        <p class="text-muted-foreground leading-relaxed">Jalur pendaftaran untuk peserta didik yang pindah domisili karena perpindahan tugas orang tua.</p>
                        <div class="mt-4 space-y-2">
                            <h4 class="font-semibold text-foreground text-sm">Persyaratan:</h4>
                            <ul class="space-y-1.5">
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Surat penugasan/perpindahan orang tua dari instansi/lembaga
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    KK dan akta kelahiran
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Memiliki NISN yang valid
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Domisili baru sesuai dengan lokasi sekolah
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl p-8 border border-border hover:shadow-xl transition-all duration-300">
                <div class="flex items-start gap-5">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center shrink-0 shadow-lg shadow-amber-500/25">
                        <svg aria-hidden="true"   class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-2xl font-bold text-foreground">Jalur Prestasi</h3>
                            <span class="px-3 py-1 bg-amber-500/10 text-amber-600 dark:text-amber-400 text-xs font-semibold rounded-full">Kuota 30%</span>
                        </div>
                        <p class="text-muted-foreground leading-relaxed">Jalur pendaftaran untuk peserta didik yang memiliki prestasi di bidang akademik maupun non-akademik.</p>
                        <div class="mt-4 space-y-2">
                            <h4 class="font-semibold text-foreground text-sm">Persyaratan:</h4>
                            <ul class="space-y-1.5">
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Memiliki prestasi akademik (juara kelas, olimpiade, dll)
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Memiliki prestasi non-akademik (olahraga, seni, dll)
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Sertifikat/piagam prestasi yang masih berlaku
                                </li>
                                <li class="flex items-start text-sm text-muted-foreground">
                                    <svg aria-hidden="true"   class="w-4 h-4 text-green-500 mt-0.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Memiliki NISN yang valid
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 lg:py-28 bg-muted/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Perbandingan</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Perbandingan Jalur Pendaftaran</h2>
            <p class="mt-4 text-muted-foreground leading-relaxed">Tabel perbandingan antar jalur pendaftaran untuk membantu Anda memilih.</p>
        </div>
        <div class="mt-12 overflow-x-auto">
            <table class="w-full text-left border-collapse" role="table" aria-label="Perbandingan jalur pendaftaran">
                <caption class="sr-only">Perbandingan antar jalur pendaftaran PPDB</caption>
                <thead>
                    <tr class="bg-muted">
                        <th class="p-4 font-bold text-foreground rounded-tl-xl" scope="col">Kriteria</th>
                        <th class="p-4 font-bold text-primary" scope="col">Zonasi</th>
                        <th class="p-4 font-bold text-green-600 dark:text-green-400" scope="col">Afirmasi</th>
                        <th class="p-4 font-bold text-purple-600 dark:text-purple-400" scope="col">Perpindahan</th>
                        <th class="p-4 font-bold text-amber-600 dark:text-amber-400 rounded-tr-xl" scope="col">Prestasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <tr class="hover:bg-muted/50">
                        <td class="p-4 font-medium text-foreground">Kuota</td>
                        <td class="p-4 text-muted-foreground">50%</td>
                        <td class="p-4 text-muted-foreground">15%</td>
                        <td class="p-4 text-muted-foreground">5%</td>
                        <td class="p-4 text-muted-foreground">30%</td>
                    </tr>
                    <tr class="hover:bg-muted/50">
                        <td class="p-4 font-medium text-foreground">Domisili</td>
                        <td class="p-4 text-muted-foreground">Wajib sesuai zonasi</td>
                        <td class="p-4 text-muted-foreground">Tidak diutamakan</td>
                        <td class="p-4 text-muted-foreground">Domisili baru</td>
                        <td class="p-4 text-muted-foreground">Tidak diutamakan</td>
                    </tr>
                    <tr class="hover:bg-muted/50">
                        <td class="p-4 font-medium text-foreground">Prestasi</td>
                        <td class="p-4 text-muted-foreground">Tidak diwajibkan</td>
                        <td class="p-4 text-muted-foreground">Tidak diwajibkan</td>
                        <td class="p-4 text-muted-foreground">Tidak diwajibkan</td>
                        <td class="p-4 text-muted-foreground">Wajib</td>
                    </tr>
                    <tr class="hover:bg-muted/50">
                        <td class="p-4 font-medium text-foreground">Ekonomi</td>
                        <td class="p-4 text-muted-foreground">-</td>
                        <td class="p-4 text-muted-foreground">Wajib SKTM/DTKS</td>
                        <td class="p-4 text-muted-foreground">-</td>
                        <td class="p-4 text-muted-foreground">-</td>
                    </tr>
                    <tr class="hover:bg-muted/50">
                        <td class="p-4 font-medium text-foreground border-b-0">Seleksi</td>
                        <td class="p-4 text-muted-foreground border-b-0">Berdasarkan jarak</td>
                        <td class="p-4 text-muted-foreground border-b-0">Verifikasi ekonomi</td>
                        <td class="p-4 text-muted-foreground border-b-0">Verifikasi perpindahan</td>
                        <td class="p-4 text-muted-foreground border-b-0">Nilai prestasi</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="py-16 bg-gradient-to-r from-primary to-primary/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-2xl sm:text-3xl font-bold text-primary-foreground">Tentukan Pilihan Anda</h3>
        <p class="mt-2 text-primary-foreground/80">Pilih jalur yang sesuai dengan kriteria dan segera daftarkan diri Anda.</p>
        <a href="{{ route('register') }}" class="inline-block mt-6 px-8 py-3 bg-primary-foreground text-primary font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">Daftar Sekarang</a>
    </div>
</section>

@endsection
