<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name', 'Laravel'))</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-muted/30 selection:bg-primary/20 selection:text-primary h-full">
        <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-primary focus:text-primary-foreground focus:px-4 focus:py-2 focus:rounded-lg">Langsung ke konten utama</a>
        <div x-data="{ sidebarOpen: false }" class="min-h-screen flex">

            {{-- Mobile overlay --}}
            <div x-show="sidebarOpen" x-cloak x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-black/40 lg:hidden" aria-hidden="true"></div>

            {{-- Sidebar --}}
            <aside
                x-cloak
                :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
                class="fixed inset-y-0 left-0 z-40 w-60 bg-card border-r border-border transition-transform duration-300 ease-in-out lg:translate-x-0 lg:fixed flex flex-col"
                role="navigation"
                aria-label="Navigasi siswa"
            >
                {{-- Header --}}
                <div class="flex items-center justify-between h-14 px-4 border-b border-border shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-md bg-gradient-to-br from-primary to-blue-600 flex items-center justify-center text-primary-foreground font-bold text-xs">P</div>
                        <span class="font-semibold text-sm text-foreground">PPDB <span class="text-primary">Siswa</span></span>
                    </a>
                    <button @click="sidebarOpen = false" class="lg:hidden p-1 rounded-md text-muted-foreground hover:text-foreground hover:bg-accent" aria-label="Tutup sidebar">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- Nav --}}
                <nav class="flex-1 px-2 py-3 space-y-0.5 overflow-y-auto" aria-label="Menu navigasi siswa">
                    @php
                        $navItems = [
                            ['href' => 'dashboard', 'active' => 'dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'label' => 'Dashboard'],
                            ['href' => 'pendaftaran.index', 'active' => 'pendaftaran.*', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'label' => 'Pendaftaran'],
                            ['href' => 'tagihan.index', 'active' => 'tagihan.*', 'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z', 'label' => 'Tagihan'],
                            ['href' => 'notifikasi.index', 'active' => 'notifikasi.*', 'icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9', 'label' => 'Notifikasi'],
                            ['href' => 'landing.pengumuman', 'active' => 'landing.pengumuman*', 'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z', 'label' => 'Pengumuman'],
                        ];
                    @endphp

                    @foreach ($navItems as $item)
                        <a href="{{ route($item['href']) }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                                  {{ request()->routeIs($item['active']) ? 'bg-primary/10 text-primary' : 'text-muted-foreground hover:bg-accent hover:text-foreground' }}"
                           {{ request()->routeIs($item['active']) ? 'aria-current="page"' : '' }}>
                            <svg aria-hidden="true" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/></svg>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>

                {{-- Mobile logout --}}
                <div class="lg:hidden px-2 py-2 border-t border-border shrink-0">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 w-full px-3 py-2 rounded-lg text-sm font-medium text-destructive hover:bg-destructive/10 transition-colors">
                            <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </aside>

            {{-- Main --}}
            <div class="flex-1 flex flex-col min-w-0 lg:ml-60">
                <header class="bg-card border-b border-border sticky top-0 z-20">
                    <div class="flex items-center justify-between h-14 px-4 sm:px-6">
                        <div class="flex items-center gap-3">
                            <button @click="sidebarOpen = true" class="lg:hidden p-1.5 rounded-md text-muted-foreground hover:text-foreground hover:bg-accent -ml-1.5" aria-label="Buka menu">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                            </button>
                            <h1 class="text-base sm:text-lg font-semibold text-foreground truncate">@yield('title', 'Dashboard')</h1>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('landing.index') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-medium text-muted-foreground hover:text-foreground transition-colors" aria-label="Lihat website">
                                <svg aria-hidden="true" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                Website
                            </a>

                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center gap-2 cursor-pointer" aria-label="Menu pengguna">
                                        <div class="hidden sm:block text-right text-xs leading-tight">
                                            <p class="text-sm font-medium text-foreground">{{ auth()->user()->name }}</p>
                                            <p class="text-muted-foreground">Siswa</p>
                                        </div>
                                        <div class="w-8 h-8 rounded-md bg-primary/10 flex items-center justify-center text-primary text-sm font-bold">
                                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <a href="{{ route('profile') }}" class="block w-full px-4 py-2.5 text-start text-sm text-foreground hover:bg-accent transition-colors">Profile</a>
                                    <hr class="border-border my-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full px-4 py-2.5 text-start text-sm text-destructive hover:bg-destructive/10 transition-colors">Keluar</button>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </header>

                @if (isset($header))
                    <div class="px-4 sm:px-6 pt-6 pb-0">
                        {{ $header }}
                    </div>
                @endif

                <main id="main-content" role="main" class="flex-1 p-4 sm:p-6 lg:p-8">
                    {{ $slot }}
                </main>

                <footer class="bg-card border-t border-border px-4 sm:px-6 py-3" role="contentinfo">
                    <p class="text-xs text-muted-foreground/80 text-center">&copy; {{ date('Y') }} {{ config('app.name', 'PPDB Online') }}.</p>
                </footer>
            </div>
        </div>

        <x-toast />
        @stack('scripts')
    </body>
</html>
