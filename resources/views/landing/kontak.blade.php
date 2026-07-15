@extends('landing.layout')

@section('title', 'Kontak')

@section('content')

<section class="relative pt-32 pb-20 lg:pt-40 lg:pb-24 bg-gradient-to-br from-primary via-primary/80 to-primary/60 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-primary-foreground/10 text-primary-foreground/90 rounded-full text-sm font-medium backdrop-blur border border-primary-foreground/10 mb-4">Kontak</span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-primary-foreground">Hubungi Kami</h1>
        <p class="mt-4 text-lg sm:text-xl text-primary-foreground/80 max-w-2xl mx-auto">Jika Anda memiliki pertanyaan, saran, atau membutuhkan bantuan, silakan hubungi kami.</p>
    </div>
</section>

<section class="py-20 lg:py-28 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <div>
                <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Informasi Kontak</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Panitia PPDB Online</h2>
                <p class="mt-4 text-muted-foreground leading-relaxed">Tim panitia PPDB siap membantu Anda. Jangan ragu untuk menghubungi kami melalui kontak di bawah ini atau datang langsung ke kantor panitia.</p>

                <div class="mt-10 space-y-6">
                    <div class="flex items-start gap-4 p-5 bg-card rounded-xl border border-border">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                            <svg aria-hidden="true"   class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-foreground">Alamat Kantor</h3>
                            <p class="text-sm text-muted-foreground mt-1">Jl. Pendidikan No. 123, Kelurahan Ilmu, Kecamatan Belajar, Kota Pendidikan 12345</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-card rounded-xl border border-border">
                        <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center shrink-0">
                            <svg aria-hidden="true"   class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-foreground">Email</h3>
                            <p class="text-sm text-muted-foreground mt-1">info@ppdb-online.sch.id</p>
                            <p class="text-sm text-muted-foreground">panitia@ppdb-online.sch.id</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-card rounded-xl border border-border">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center shrink-0">
                            <svg aria-hidden="true"   class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-foreground">Telepon</h3>
                            <p class="text-sm text-muted-foreground mt-1">(021) 1234-5678</p>
                            <p class="text-sm text-muted-foreground">(021) 8765-4321</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-card rounded-xl border border-border">
                        <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center shrink-0">
                            <svg aria-hidden="true"   class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-foreground">Jam Kerja</h3>
                            <p class="text-sm text-muted-foreground mt-1">Senin - Jumat: 08.00 - 16.00 WIB</p>
                            <p class="text-sm text-muted-foreground">Sabtu: 08.00 - 12.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Form Kontak</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Kirim Pesan</h2>
                <p class="mt-4 text-muted-foreground leading-relaxed">Isi form di bawah ini untuk mengirimkan pesan atau pertanyaan kepada panitia PPDB.</p>

                <form class="mt-8 space-y-6" role="search" aria-label="Form kontak">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="name" class="block text-sm font-medium text-foreground mb-2">Nama Lengkap</label>
                            <input type="text" id="name" class="w-full px-4 py-3 rounded-xl border border-input bg-background text-foreground focus:ring-2 focus:ring-ring focus:border-transparent transition-all duration-200" placeholder="Masukkan nama lengkap" aria-label="Nama Lengkap">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-foreground mb-2">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-3 rounded-xl border border-input bg-background text-foreground focus:ring-2 focus:ring-ring focus:border-transparent transition-all duration-200" placeholder="Masukkan email" aria-label="Email">
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium text-foreground mb-2">Subjek</label>
                        <input type="text" id="subject" class="w-full px-4 py-3 rounded-xl border border-input bg-background text-foreground focus:ring-2 focus:ring-ring focus:border-transparent transition-all duration-200" placeholder="Masukkan subjek pesan" aria-label="Subjek">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-foreground mb-2">Pesan</label>
                        <textarea id="message" rows="5" class="w-full px-4 py-3 rounded-xl border border-input bg-background text-foreground focus:ring-2 focus:ring-ring focus:border-transparent transition-all duration-200 resize-none" placeholder="Tulis pesan Anda..." aria-label="Pesan"></textarea>
                    </div>
                    <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-primary text-primary-foreground font-semibold rounded-xl hover:opacity-90 shadow-lg shadow-primary/25 transition-all duration-200">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-muted/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 bg-rose-500/10 text-rose-600 dark:text-rose-300 rounded-full text-sm font-medium mb-4">Lokasi</span>
            <h2 class="text-3xl font-bold text-foreground">Lokasi Kantor Panitia</h2>
        </div>
        <div class="rounded-2xl overflow-hidden shadow-lg border border-border h-96 bg-muted flex items-center justify-center">
            <div class="text-center text-muted-foreground">
                <svg aria-hidden="true"   class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <p class="font-medium">Peta Lokasi</p>
                <p class="text-sm">Jl. Pendidikan No. 123, Kota Pendidikan</p>
                <p class="text-xs mt-2 text-primary">Integrasikan dengan Google Maps atau OpenStreetMap</p>
            </div>
        </div>
    </div>
</section>

@endsection
