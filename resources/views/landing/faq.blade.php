@extends('landing.layout')

@section('title', 'FAQ')

@push('styles')
<style>
.faq-accordion [x-show] {
    transition: all 0.3s ease-in-out;
}
</style>
@endpush

@section('content')

<section class="relative pt-32 pb-20 lg:pt-40 lg:pb-24 bg-gradient-to-br from-primary via-primary/80 to-primary/60 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-primary-foreground/10 text-primary-foreground/90 rounded-full text-sm font-medium backdrop-blur border border-primary-foreground/10 mb-4">FAQ</span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-primary-foreground">Pertanyaan Umum</h1>
        <p class="mt-4 text-lg sm:text-xl text-primary-foreground/80 max-w-2xl mx-auto">Temukan jawaban atas pertanyaan yang sering diajukan tentang PPDB Online.</p>
    </div>
</section>

<section class="py-20 lg:py-28 bg-background">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-data="{ active: null }" class="space-y-4">
            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 1 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Apa itu PPDB Online?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        PPDB Online adalah sistem Penerimaan Peserta Didik Baru yang dilakukan secara digital/daring. Sistem ini memungkinkan calon peserta didik untuk mendaftar, mengunggah berkas, memantau proses seleksi, dan melihat hasil pengumuman secara online tanpa harus datang ke sekolah.
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 2 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Bagaimana cara mendaftar PPDB Online?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        <p class="mb-2">Cara mendaftar PPDB Online:</p>
                        <ol class="list-decimal list-inside space-y-1">
                            <li>Buat akun melalui halaman registrasi</li>
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

            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 3 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Apa saja dokumen yang diperlukan untuk pendaftaran?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        <p class="mb-2">Dokumen yang diperlukan:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Kartu Keluarga (KK)</li>
                            <li>Akta Kelahiran</li>
                            <li>Ijazah/SKHUN (Sertifikat Hasil Ujian Nasional)</li>
                            <li>Pas foto terbaru (ukuran 3x4 atau 4x6)</li>
                            <li>NISN (Nomor Induk Siswa Nasional)</li>
                            <li>Dokumen tambahan sesuai jalur pendaftaran (SKTM, sertifikat prestasi, dll)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 4 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Berapa biaya pendaftaran PPDB Online?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        Pendaftaran PPDB Online <strong>tidak dipungut biaya alias GRATIS</strong>. PPDB Online diselenggarakan oleh pemerintah untuk memberikan akses pendidikan yang seluas-luasnya kepada seluruh masyarakat. Waspadai segala bentuk pungutan liar yang mengatasnamakan PPDB.
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 5 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Apa saja jalur pendaftaran yang tersedia?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        <p class="mb-2">Terdapat 4 jalur pendaftaran PPDB:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li><strong>Jalur Zonasi</strong> (Kuota 50%) - Berdasarkan domisili di dalam zonasi sekolah</li>
                            <li><strong>Jalur Afirmasi</strong> (Kuota 15%) - Untuk keluarga tidak mampu</li>
                            <li><strong>Jalur Perpindahan Tugas</strong> (Kuota 5%) - Perpindahan domisili orang tua</li>
                            <li><strong>Jalur Prestasi</strong> (Kuota 30%) - Prestasi akademik/non-akademik</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 6 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Bagaimana cara mengetahui hasil seleksi?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        Hasil seleksi dapat dilihat melalui:
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Login ke akun PPDB Online masing-masing</li>
                            <li>Website resmi PPDB Online pada halaman pengumuman</li>
                            <li>Notifikasi akan dikirimkan melalui email dan/atau SMS</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 7 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Apa yang harus dilakukan jika lulus seleksi?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        <p class="mb-2">Jika dinyatakan lulus seleksi, langkah selanjutnya:</p>
                        <ol class="list-decimal list-inside space-y-1">
                            <li>Lakukan daftar ulang sesuai jadwal yang telah ditentukan</li>
                            <li>Siapkan dokumen asli untuk verifikasi saat daftar ulang</li>
                            <li>Ikuti kegiatan MPLS (Masa Pengenalan Lingkungan Sekolah)</li>
                            <li>Lengkapi administrasi sekolah yang diperlukan</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 8 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Apakah bisa mengganti jalur pendaftaran setelah submit?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        Jalur pendaftaran dapat diganti selama masa pendaftaran masih berlangsung dan sebelum melakukan submit final. Setelah pendaftaran disubmit dan masuk tahap verifikasi, jalur pendaftaran tidak dapat diubah lagi. Pastikan Anda memilih jalur yang sesuai sebelum melakukan submit.
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 9 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Bagaimana jika lupa password akun PPDB?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        Jika lupa password, Anda dapat menggunakan fitur <strong>"Lupa Password"</strong> pada halaman login. Masukkan email yang terdaftar, dan kami akan mengirimkan tautan reset password ke email Anda. Jika masih mengalami kendala, silakan hubungi panitia PPDB melalui halaman kontak.
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-2xl border border-border overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open; active = open ? 10 : null" class="w-full flex items-center justify-between p-6 text-left" :class="open ? 'bg-primary/5' : ''">
                    <span class="text-lg font-semibold text-foreground pr-4">Kapan jadwal pelaksanaan PPDB tahun ini?</span>
                    <svg aria-hidden="true" class="w-5 h-5 text-muted-foreground shrink-0 transition-transform duration-300" :  class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-collapse>
                    <div class="px-6 pb-6 text-muted-foreground leading-relaxed">
                        <p class="mb-2">Jadwal PPDB Tahun {{ date('Y') }}/{{ date('Y') + 1 }}:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Pendaftaran: 1 - 31 Juli {{ date('Y') }}</li>
                            <li>Verifikasi Berkas: 1 Juli - 5 Agustus {{ date('Y') }}</li>
                            <li>Seleksi: 6 - 15 Agustus {{ date('Y') }}</li>
                            <li>Pengumuman: 20 Agustus {{ date('Y') }}</li>
                            <li>Daftar Ulang: 21 - 31 Agustus {{ date('Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gradient-to-r from-primary to-primary/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-2xl sm:text-3xl font-bold text-primary-foreground">Masih Punya Pertanyaan?</h3>
        <p class="mt-2 text-primary-foreground/80">Hubungi panitia PPDB untuk pertanyaan lebih lanjut.</p>
        <a href="{{ route('landing.kontak') }}" class="inline-block mt-6 px-8 py-3 bg-primary-foreground text-primary font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">Hubungi Kami</a>
    </div>
</section>

@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
@endpush
