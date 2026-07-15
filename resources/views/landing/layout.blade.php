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
<body class="font-sans antialiased bg-background text-foreground">

    <nav x-data="{ open: false, scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })" class="fixed w-full z-50 transition-all duration-300" :class="scrolled ? 'bg-card/80 backdrop-blur-xl border-b border-border shadow-sm' : 'bg-transparent'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <a href="{{ route('landing.index') }}" class="flex items-center space-x-2.5">
                    <div class="w-9 h-9 rounded-lg bg-primary flex items-center justify-center text-primary-foreground font-bold text-xs shadow-sm">PPDB</div>
                    <span class="font-bold text-base hidden sm:block" :class="scrolled ? 'text-foreground' : 'text-white'">{{ config('app.name', 'PPDB Online') }}</span>
                </a>

                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('landing.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200" :class="{
                        'text-primary bg-primary/10': {{ request()->routeIs('landing.index') ? 'true' : 'false' }},
                        'text-foreground/80 hover:text-foreground hover:bg-accent': {{ request()->routeIs('landing.index') ? 'false' : 'true' }} && scrolled,
                        'text-white/80 hover:text-white hover:bg-white/10': {{ request()->routeIs('landing.index') ? 'false' : 'true' }} && !scrolled
                    }">Beranda</a>
                    <a href="{{ route('landing.info') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200" :class="{
                        'text-primary bg-primary/10': {{ request()->routeIs('landing.info') ? 'true' : 'false' }},
                        'text-foreground/80 hover:text-foreground hover:bg-accent': {{ request()->routeIs('landing.info') ? 'false' : 'true' }} && scrolled,
                        'text-white/80 hover:text-white hover:bg-white/10': {{ request()->routeIs('landing.info') ? 'false' : 'true' }} && !scrolled
                    }">Info PPDB</a>
                    <a href="{{ route('landing.jalur') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200" :class="{
                        'text-primary bg-primary/10': {{ request()->routeIs('landing.jalur') ? 'true' : 'false' }},
                        'text-foreground/80 hover:text-foreground hover:bg-accent': {{ request()->routeIs('landing.jalur') ? 'false' : 'true' }} && scrolled,
                        'text-white/80 hover:text-white hover:bg-white/10': {{ request()->routeIs('landing.jalur') ? 'false' : 'true' }} && !scrolled
                    }">Jalur Pendaftaran</a>
                    <a href="{{ route('landing.pengumuman') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200" :class="{
                        'text-primary bg-primary/10': {{ request()->routeIs('landing.pengumuman*') ? 'true' : 'false' }},
                        'text-foreground/80 hover:text-foreground hover:bg-accent': {{ request()->routeIs('landing.pengumuman*') ? 'false' : 'true' }} && scrolled,
                        'text-white/80 hover:text-white hover:bg-white/10': {{ request()->routeIs('landing.pengumuman*') ? 'false' : 'true' }} && !scrolled
                    }">Pengumuman</a>
                    <a href="{{ route('landing.faq') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200" :class="{
                        'text-primary bg-primary/10': {{ request()->routeIs('landing.faq') ? 'true' : 'false' }},
                        'text-foreground/80 hover:text-foreground hover:bg-accent': {{ request()->routeIs('landing.faq') ? 'false' : 'true' }} && scrolled,
                        'text-white/80 hover:text-white hover:bg-white/10': {{ request()->routeIs('landing.faq') ? 'false' : 'true' }} && !scrolled
                    }">FAQ</a>
                    <a href="{{ route('landing.kontak') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200" :class="{
                        'text-primary bg-primary/10': {{ request()->routeIs('landing.kontak') ? 'true' : 'false' }},
                        'text-foreground/80 hover:text-foreground hover:bg-accent': {{ request()->routeIs('landing.kontak') ? 'false' : 'true' }} && scrolled,
                        'text-white/80 hover:text-white hover:bg-white/10': {{ request()->routeIs('landing.kontak') ? 'false' : 'true' }} && !scrolled
                    }">Kontak</a>
                </div>

                <div class="hidden lg:flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200" :class="scrolled ? 'text-foreground hover:text-primary border border-border hover:border-primary' : 'text-white/80 hover:text-white border border-white/20 hover:border-white/40'">Masuk</a>
                    <a href="{{ route('register') }}" class="px-5 py-2 rounded-lg text-sm font-semibold text-primary-foreground bg-primary hover:opacity-90 shadow-sm transition-all duration-200">Daftar</a>
                </div>

                <button @click="open = !open" class="lg:hidden p-2 rounded-lg" :class="scrolled ? 'text-foreground hover:bg-accent' : 'text-white/80 hover:text-white hover:bg-white/10'">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div :class="{'block': open, 'hidden': !open}" class="lg:hidden bg-card border-t border-border shadow-xl">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ route('landing.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('landing.index') ? 'text-primary bg-primary/10' : 'text-foreground hover:bg-accent' }}">Beranda</a>
                <a href="{{ route('landing.info') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('landing.info') ? 'text-primary bg-primary/10' : 'text-foreground hover:bg-accent' }}">Info PPDB</a>
                <a href="{{ route('landing.jalur') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('landing.jalur') ? 'text-primary bg-primary/10' : 'text-foreground hover:bg-accent' }}">Jalur Pendaftaran</a>
                <a href="{{ route('landing.pengumuman') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('landing.pengumuman*') ? 'text-primary bg-primary/10' : 'text-foreground hover:bg-accent' }}">Pengumuman</a>
                <a href="{{ route('landing.faq') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('landing.faq') ? 'text-primary bg-primary/10' : 'text-foreground hover:bg-accent' }}">FAQ</a>
                <a href="{{ route('landing.kontak') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('landing.kontak') ? 'text-primary bg-primary/10' : 'text-foreground hover:bg-accent' }}">Kontak</a>
                <hr class="border-border my-2">
                <a href="{{ route('login') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-foreground hover:bg-accent">Masuk</a>
                <a href="{{ route('register') }}" class="block px-3 py-2.5 rounded-lg text-sm font-semibold text-primary-foreground bg-primary hover:opacity-90 text-center">Daftar</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-card border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-9 h-9 rounded-lg bg-primary flex items-center justify-center text-primary-foreground font-bold text-xs">PPDB</div>
                        <span class="font-bold text-lg text-foreground">{{ config('app.name', 'PPDB Online') }}</span>
                    </div>
                    <p class="text-muted-foreground leading-relaxed max-w-md">Sistem Penerimaan Peserta Didik Baru (PPDB) Online untuk memudahkan proses pendaftaran sekolah secara digital, transparan, dan akuntabel.</p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="w-9 h-9 rounded-full bg-secondary hover:bg-primary hover:text-primary-foreground flex items-center justify-center transition-all duration-200 text-muted-foreground">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-secondary hover:bg-primary hover:text-primary-foreground flex items-center justify-center transition-all duration-200 text-muted-foreground">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.11 2.525c.636-.247 1.363-.416 2.427-.465C8.88 2.013 9.235 2 11.667 2h.648zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.365a7.635 7.635 0 110 15.27 7.635 7.635 0 010-15.27zm0 2.043a5.592 5.592 0 100 11.184 5.592 5.592 0 000-11.184zm0 9.141a3.549 3.549 0 110-7.098 3.549 3.549 0 010 7.098zm0-5.655a2.106 2.106 0 100 4.212 2.106 2.106 0 000-4.212zm5.695-3.285a1.14 1.14 0 110 2.28 1.14 1.14 0 010-2.28z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-secondary hover:bg-primary hover:text-primary-foreground flex items-center justify-center transition-all duration-200 text-muted-foreground">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-secondary hover:bg-primary hover:text-primary-foreground flex items-center justify-center transition-all duration-200 text-muted-foreground">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold text-foreground mb-4 text-base">Navigasi</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('landing.index') }}" class="text-muted-foreground hover:text-foreground transition-colors duration-200 text-sm">Beranda</a></li>
                        <li><a href="{{ route('landing.info') }}" class="text-muted-foreground hover:text-foreground transition-colors duration-200 text-sm">Info PPDB</a></li>
                        <li><a href="{{ route('landing.jalur') }}" class="text-muted-foreground hover:text-foreground transition-colors duration-200 text-sm">Jalur Pendaftaran</a></li>
                        <li><a href="{{ route('landing.pengumuman') }}" class="text-muted-foreground hover:text-foreground transition-colors duration-200 text-sm">Pengumuman</a></li>
                        <li><a href="{{ route('landing.faq') }}" class="text-muted-foreground hover:text-foreground transition-colors duration-200 text-sm">FAQ</a></li>
                        <li><a href="{{ route('landing.kontak') }}" class="text-muted-foreground hover:text-foreground transition-colors duration-200 text-sm">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-foreground mb-4 text-base">Kontak</h3>
                    <ul class="space-y-3 text-muted-foreground">
                        <li class="flex items-start space-x-2.5">
                            <svg class="w-4 h-4 mt-0.5 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-sm">Jl. Pendidikan No. 123, Kota Pendidikan</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span class="text-sm">info@ppdb-online.sch.id</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-sm">(021) 1234-5678</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-border mt-10 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-muted-foreground">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'PPDB Online') }}. All rights reserved.</p>
                <p class="mt-2 md:mt-0">Dikembangkan dengan <span class="text-destructive">&hearts;</span> oleh Tim IT</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
