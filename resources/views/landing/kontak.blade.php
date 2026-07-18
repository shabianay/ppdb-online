@extends('landing.layout')

@section('title', 'Kontak')

@section('content')

<section class="pt-32 pb-24 lg:pt-40 lg:pb-28 overflow-hidden" style="background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(221, 83%, 38%) 100%)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="inline-flex items-center px-4 py-1.5 bg-white/15 text-white text-sm font-medium rounded-full">Kontak</p>
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mt-6">Hubungi Kami</h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-3xl mx-auto mt-4 leading-relaxed">Jika Anda memiliki pertanyaan, saran, atau membutuhkan bantuan, silakan hubungi kami.</p>
    </div>
</section>

<section class="py-24 lg:py-32 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                <p class="section-label text-left">Informasi Kontak</p>
                <h2 class="section-title text-left">Panitia PPDB Online</h2>
                <p class="text-muted-foreground leading-relaxed mt-4">Tim panitia PPDB siap membantu Anda. Jangan ragu untuk menghubungi kami melalui kontak di bawah ini.</p>
                <div class="mt-10 space-y-4">
                    <div class="flex items-start gap-4 p-5 card">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 text-primary">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-foreground">Alamat Kantor</p>
                            <p class="text-sm text-muted-foreground mt-0.5">Jl. Pendidikan No. 123, Kelurahan Ilmu, Kecamatan Belajar, Kota Pendidikan 12345</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 card">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center shrink-0 text-emerald-600">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-foreground">Email</p>
                            <p class="text-sm text-muted-foreground mt-0.5">info@ppdb-online.sch.id</p>
                            <p class="text-sm text-muted-foreground">panitia@ppdb-online.sch.id</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 card">
                        <div class="w-10 h-10 rounded-xl bg-violet-500/10 flex items-center justify-center shrink-0 text-violet-600">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-foreground">Telepon</p>
                            <p class="text-sm text-muted-foreground mt-0.5">(021) 1234-5678</p>
                            <p class="text-sm text-muted-foreground">(021) 8765-4321</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 card">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/10 flex items-center justify-center shrink-0 text-amber-600">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-foreground">Jam Kerja</p>
                            <p class="text-sm text-muted-foreground mt-0.5">Senin &mdash; Jumat: 08.00 &ndash; 16.00 WIB</p>
                            <p class="text-sm text-muted-foreground">Sabtu: 08.00 &ndash; 12.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <p class="section-label text-left">Form Kontak</p>
                <h2 class="section-title text-left">Kirim Pesan</h2>
                <p class="text-muted-foreground leading-relaxed mt-4">Isi form di bawah untuk mengirimkan pesan atau pertanyaan kepada panitia PPDB.</p>
                <form class="mt-8 space-y-5" role="form" aria-label="Form kontak">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="name" class="block text-sm font-medium text-foreground mb-1.5">Nama Lengkap</label>
                            <input type="text" id="name" class="w-full px-4 py-2.5 rounded-xl border border-input bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-ring" placeholder="Nama lengkap">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-foreground mb-1.5">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-2.5 rounded-xl border border-input bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-ring" placeholder="Email">
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium text-foreground mb-1.5">Subjek</label>
                        <input type="text" id="subject" class="w-full px-4 py-2.5 rounded-xl border border-input bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-ring" placeholder="Subjek pesan">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-foreground mb-1.5">Pesan</label>
                        <textarea id="message" rows="5" class="w-full px-4 py-2.5 rounded-xl border border-input bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-ring resize-none" placeholder="Tulis pesan Anda..."></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-muted/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="section-label">Lokasi</p>
        <h2 class="section-title">Lokasi Kantor Panitia</h2>
        <div class="rounded-2xl overflow-hidden border border-border h-80 bg-muted flex items-center justify-center mt-10">
            <div class="text-center text-muted-foreground">
                <svg aria-hidden="true" class="w-14 h-14 mx-auto mb-4 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <p class="font-medium">Peta Lokasi</p>
                <p class="text-sm">Jl. Pendidikan No. 123, Kota Pendidikan</p>
            </div>
        </div>
    </div>
</section>

@endsection
