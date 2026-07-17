<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'PPDB Online')) - Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-muted/30">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-primary focus:text-primary-foreground focus:px-4 focus:py-2 focus:rounded-lg">Langsung ke konten utama</a>
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex">

        <div x-show="sidebarOpen" x-cloak x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-black/40 lg:hidden" aria-hidden="true"></div>

        <aside
            x-cloak
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-40 w-60 bg-card border-r border-border transition-transform duration-300 ease-in-out lg:translate-x-0 lg:fixed flex flex-col"
            role="navigation"
            aria-label="Navigasi admin"
        >
            <div class="flex items-center justify-between h-14 px-4 border-b border-border shrink-0">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-md bg-primary flex items-center justify-center text-primary-foreground font-bold text-xs">A</div>
                    <span class="font-semibold text-sm text-foreground">PPDB <span class="text-primary">Admin</span></span>
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden p-1 rounded-md text-muted-foreground hover:text-foreground hover:bg-accent" aria-label="Tutup sidebar">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <nav class="flex-1 px-2 py-3 overflow-y-auto" aria-label="Menu navigasi sidebar">
                @php
                    $groups = [
                        '' => [
                            ['href' => 'admin.dashboard', 'active' => 'admin.dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'label' => 'Dashboard'],
                            ['href' => 'admin.verifikasi.index', 'active' => 'admin.verifikasi.*', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Verifikasi'],
                            ['href' => 'admin.jalur-pendaftaran.index', 'active' => 'admin.jalur-pendaftaran.*', 'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4', 'label' => 'Jalur'],
                            ['href' => 'admin.gelombang.index', 'active' => 'admin.gelombang.*', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'label' => 'Gelombang'],
                            ['href' => 'admin.pengumuman.index', 'active' => 'admin.pengumuman.*', 'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z', 'label' => 'Pengumuman'],
                            ['href' => 'admin.seleksi.index', 'active' => 'admin.seleksi.*', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'label' => 'Seleksi'],
                        ],
                        'Laporan' => [
                            ['href' => 'admin.laporan.pendaftar', 'active' => 'admin.laporan.pendaftar', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'label' => 'Pendaftar'],
                            ['href' => 'admin.laporan.keuangan', 'active' => 'admin.laporan.keuangan', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Keuangan'],
                        ],
                        'Lainnya' => [
                            ['href' => 'admin.dokumen-persyaratan.index', 'active' => 'admin.dokumen-persyaratan.*', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'label' => 'Persyaratan Dokumen'],
                            ['href' => 'admin.audit-log.index', 'active' => 'admin.audit-log.*', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'label' => 'Audit Trail'],
                            ['href' => 'admin.settings.index', 'active' => 'admin.settings.*', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Pengaturan'],
                            ['href' => 'admin.users.index', 'active' => 'admin.users.*', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'label' => 'Pengguna'],
                        ],
                    ];
                @endphp

                @foreach ($groups as $groupLabel => $items)
                    @if ($groupLabel)
                        <div class="mt-5 mb-1 px-3 text-[11px] font-semibold uppercase tracking-widest text-muted-foreground/50">{{ $groupLabel }}</div>
                    @endif
                    @foreach ($items as $item)
                        <a href="{{ route($item['href']) }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                                  {{ request()->routeIs($item['active']) ? 'bg-primary/10 text-primary' : 'text-muted-foreground hover:bg-accent hover:text-foreground' }}"
                           {{ request()->routeIs($item['active']) ? 'aria-current="page"' : '' }}>
                            <svg aria-hidden="true" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/></svg>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                @endforeach
            </nav>

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
                        <a href="{{ route('landing.index') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-medium text-muted-foreground hover:text-foreground transition-colors" aria-label="Lihat website (buka tab baru)">
                            <svg aria-hidden="true" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            Website
                        </a>

                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center gap-2 cursor-pointer" aria-label="Menu pengguna">
                                    <div class="hidden sm:block text-right text-xs leading-tight">
                                        <p class="text-sm font-medium text-foreground">{{ Auth::user()->name }}</p>
                                        <p class="text-muted-foreground">{{ ucfirst(Auth::user()->role) }}</p>
                                    </div>
                                    <div class="w-8 h-8 rounded-md bg-primary/10 flex items-center justify-center text-primary text-sm font-bold">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <a href="{{ route('profile') }}" class="block w-full px-4 py-2.5 text-start text-sm text-foreground hover:bg-accent transition-colors">
                                    Profile
                                </a>
                                <hr class="border-border my-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full px-4 py-2.5 text-start text-sm text-destructive hover:bg-destructive/10 transition-colors">
                                        Keluar
                                    </button>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </header>

            <main id="main-content" class="flex-1 p-4 sm:p-6 lg:p-8" role="main">
                @yield('content')
            </main>

            <footer class="bg-card border-t border-border px-4 sm:px-6 py-3" role="contentinfo">
                <p class="text-xs text-muted-foreground text-center">&copy; {{ date('Y') }} {{ config('app.name', 'PPDB Online') }}.</p>
            </footer>
        </div>
    </div>

    @stack('scripts')
    <x:toast />
</body>
</html>
