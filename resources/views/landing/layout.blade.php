<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'PPDB Online')) - {{ config('app.name', 'PPDB Online') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-primary focus:text-primary-foreground focus:rounded-xl focus:shadow-lg">Lompat ke konten utama</a>

    <nav x-data="{ open: false, scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" :class="scrolled ? 'bg-white/90 dark:bg-slate-900/90 backdrop-blur-md shadow-sm' : 'bg-transparent'" role="navigation" aria-label="Navigasi utama">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <a href="{{ route('landing.index') }}" class="flex items-center gap-2.5 shrink-0">
                    <span class="w-9 h-9 rounded-xl bg-primary flex items-center justify-center text-primary-foreground font-bold text-sm">PPDB</span>
                    <span class="font-semibold text-sm tracking-tight hidden sm:block transition-colors" :class="scrolled ? 'text-foreground' : 'text-white'">{{ config('app.name', 'PPDB Online') }}</span>
                </a>

                <div class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('landing.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200" :class="scrolled ? '{{ request()->routeIs('landing.index') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.index') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.index') ? 'aria-current="page"' : '' }}>Beranda</a>
                    <a href="{{ route('landing.info') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200" :class="scrolled ? '{{ request()->routeIs('landing.info') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.info') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.info') ? 'aria-current="page"' : '' }}>Info</a>
                    <a href="{{ route('landing.jalur') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200" :class="scrolled ? '{{ request()->routeIs('landing.jalur') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.jalur') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.jalur') ? 'aria-current="page"' : '' }}>Jalur</a>
                    <a href="{{ route('landing.pengumuman') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200" :class="scrolled ? '{{ request()->routeIs('landing.pengumuman*') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.pengumuman*') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.pengumuman*') ? 'aria-current="page"' : '' }}>Pengumuman</a>
                    <a href="{{ route('landing.faq') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200" :class="scrolled ? '{{ request()->routeIs('landing.faq') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.faq') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.faq') ? 'aria-current="page"' : '' }}>FAQ</a>
                    <a href="{{ route('landing.kontak') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200" :class="scrolled ? '{{ request()->routeIs('landing.kontak') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.kontak') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.kontak') ? 'aria-current="page"' : '' }}>Kontak</a>
                </div>

                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('login') }}" class="text-sm font-medium transition-colors" :class="scrolled ? 'text-muted-foreground hover:text-foreground' : 'text-white/70 hover:text-white'">Masuk</a>
                    <a href="{{ route('register') }}" class="btn-primary text-sm" :class="scrolled ? '' : 'bg-white text-primary hover:bg-white/90'">Daftar</a>
                </div>

                <button @click="open = !open" class="lg:hidden p-2 rounded-lg transition-colors" :class="scrolled ? 'text-foreground hover:bg-accent' : 'text-white/80 hover:text-white hover:bg-white/10'" aria-label="Menu" :aria-expanded="open">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div x-show="open" x-cloak x-collapse @click.away="open = false" class="lg:hidden border-t" :class="scrolled ? 'border-border' : 'border-white/10'">
            <div class="px-4 py-4 space-y-1" :class="scrolled ? 'bg-white/90 dark:bg-slate-900/90 backdrop-blur-md' : 'bg-transparent'">
                <a href="{{ route('landing.index') }}" class="block px-3 py-2.5 rounded-xl text-sm font-medium transition-colors" :class="scrolled ? '{{ request()->routeIs('landing.index') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.index') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.index') ? 'aria-current="page"' : '' }}>Beranda</a>
                <a href="{{ route('landing.info') }}" class="block px-3 py-2.5 rounded-xl text-sm font-medium transition-colors" :class="scrolled ? '{{ request()->routeIs('landing.info') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.info') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.info') ? 'aria-current="page"' : '' }}>Info</a>
                <a href="{{ route('landing.jalur') }}" class="block px-3 py-2.5 rounded-xl text-sm font-medium transition-colors" :class="scrolled ? '{{ request()->routeIs('landing.jalur') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.jalur') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.jalur') ? 'aria-current="page"' : '' }}>Jalur</a>
                <a href="{{ route('landing.pengumuman') }}" class="block px-3 py-2.5 rounded-xl text-sm font-medium transition-colors" :class="scrolled ? '{{ request()->routeIs('landing.pengumuman*') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.pengumuman*') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.pengumuman*') ? 'aria-current="page"' : '' }}>Pengumuman</a>
                <a href="{{ route('landing.faq') }}" class="block px-3 py-2.5 rounded-xl text-sm font-medium transition-colors" :class="scrolled ? '{{ request()->routeIs('landing.faq') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.faq') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.faq') ? 'aria-current="page"' : '' }}>FAQ</a>
                <a href="{{ route('landing.kontak') }}" class="block px-3 py-2.5 rounded-xl text-sm font-medium transition-colors" :class="scrolled ? '{{ request()->routeIs('landing.kontak') ? 'text-primary bg-primary/10' : 'text-foreground/80 hover:text-foreground hover:bg-accent' }}' : '{{ request()->routeIs('landing.kontak') ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10' }}'" {{ request()->routeIs('landing.kontak') ? 'aria-current="page"' : '' }}>Kontak</a>
                <div class="pt-4 mt-4 space-y-2" :class="scrolled ? 'border-t border-border' : 'border-t border-white/10'">
                    <a href="{{ route('login') }}" class="block w-full text-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors" :class="scrolled ? 'text-muted-foreground hover:text-foreground hover:bg-accent' : 'text-white/70 hover:text-white hover:bg-white/10'">Masuk</a>
                    <a href="{{ route('register') }}" class="block w-full text-center px-3 py-2.5 rounded-xl text-sm font-medium" :class="scrolled ? 'bg-primary text-primary-foreground' : 'bg-white text-primary'">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <main id="main">
        @yield('content')
    </main>

    <footer class="border-t border-border bg-card" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">
                <div class="lg:col-span-5">
                    <a href="{{ route('landing.index') }}" class="flex items-center gap-2.5 mb-4">
                        <span class="w-9 h-9 rounded-xl bg-primary flex items-center justify-center text-primary-foreground font-bold text-sm">PPDB</span>
                        <span class="font-semibold text-foreground">{{ config('app.name', 'PPDB Online') }}</span>
                    </a>
                    <p class="text-sm text-muted-foreground leading-relaxed max-w-xs">Sistem Penerimaan Peserta Didik Baru secara online yang transparan, akuntabel, dan mudah diakses.</p>
                    <div class="flex gap-3 mt-6">
                        <a href="#" class="w-9 h-9 rounded-xl bg-muted hover:bg-primary hover:text-primary-foreground flex items-center justify-center transition-colors text-muted-foreground" aria-label="Facebook">
                            <svg aria-hidden="true" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-muted hover:bg-primary hover:text-primary-foreground flex items-center justify-center transition-colors text-muted-foreground" aria-label="Instagram">
                            <svg aria-hidden="true" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.11 2.525c.636-.247 1.363-.416 2.427-.465C8.88 2.013 9.235 2 11.667 2h.648zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.365a7.635 7.635 0 110 15.27 7.635 7.635 0 010-15.27zm0 2.043a5.592 5.592 0 100 11.184 5.592 5.592 0 000-11.184zm0 9.141a3.549 3.549 0 110-7.098 3.549 3.549 0 010 7.098zm0-5.655a2.106 2.106 0 100 4.212 2.106 2.106 0 000-4.212zm5.695-3.285a1.14 1.14 0 110 2.28 1.14 1.14 0 010-2.28z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-muted hover:bg-primary hover:text-primary-foreground flex items-center justify-center transition-colors text-muted-foreground" aria-label="Twitter">
                            <svg aria-hidden="true" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                        </a>
                    </div>
                </div>
                <div class="lg:col-span-3">
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-foreground mb-5">Navigasi</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('landing.index') }}" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Beranda</a></li>
                        <li><a href="{{ route('landing.info') }}" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Info PPDB</a></li>
                        <li><a href="{{ route('landing.jalur') }}" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Jalur Pendaftaran</a></li>
                        <li><a href="{{ route('landing.pengumuman') }}" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Pengumuman</a></li>
                        <li><a href="{{ route('landing.faq') }}" class="text-sm text-muted-foreground hover:text-foreground transition-colors">FAQ</a></li>
                        <li><a href="{{ route('landing.kontak') }}" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Kontak</a></li>
                    </ul>
                </div>
                <div class="lg:col-span-4">
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-foreground mb-5">Kontak</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2.5 text-sm text-muted-foreground">
                            <svg aria-hidden="true" class="w-4 h-4 mt-0.5 shrink-0 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Jl. Pendidikan No. 123, Kota Pendidikan
                        </li>
                        <li class="flex items-center gap-2.5 text-sm text-muted-foreground">
                            <svg aria-hidden="true" class="w-4 h-4 shrink-0 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            info@ppdb-online.sch.id
                        </li>
                        <li class="flex items-center gap-2.5 text-sm text-muted-foreground">
                            <svg aria-hidden="true" class="w-4 h-4 shrink-0 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            (021) 1234-5678
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-border mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-2 text-sm text-muted-foreground">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'PPDB Online') }}. All rights reserved.</p>
                <p>Dikembangkan oleh Tim IT</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
