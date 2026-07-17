<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-950 dark:via-blue-950 dark:to-indigo-950 selection:bg-primary/20 selection:text-primary h-full">
        <a href="#guest-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-primary focus:text-primary-foreground focus:rounded-lg focus:shadow-lg">Lompat ke konten utama</a>
        <div id="guest-content" class="min-h-screen flex flex-col items-center justify-center pt-6 sm:pt-0 pb-10" role="main">
            <div class="mb-8">
                <a href="{{ url('/') }}" aria-label="{{ config('app.name', 'PPDB Online') }} Logo">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary to-blue-600 flex items-center justify-center text-primary-foreground font-bold text-xl shadow-lg shadow-primary/25">
                        PPDB
                    </div>
                </a>
            </div>
            <div class="w-full sm:max-w-md px-8 py-10 bg-card text-card-foreground border border-border shadow-xl sm:rounded-2xl animate-fade-in">
                {{ $slot }}
            </div>
            <p class="mt-8 text-xs text-muted-foreground/80">&copy; {{ date('Y') }} {{ config('app.name', 'PPDB Online') }}. All rights reserved.</p>
        </div>
    </body>
</html>
