<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-muted/50">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-6">
                <a href="/" wire:navigate>
                    <div class="w-14 h-14 rounded-xl bg-primary flex items-center justify-center text-primary-foreground font-bold text-lg shadow-lg shadow-primary/25">
                        PPDB
                    </div>
                </a>
            </div>
            <div class="w-full sm:max-w-md px-6 py-8 bg-card text-card-foreground border border-border shadow-lg sm:rounded-xl">
                {{ $slot }}
            </div>
            <p class="mt-6 text-xs text-muted-foreground">&copy; {{ date('Y') }} {{ config('app.name', 'PPDB Online') }}. All rights reserved.</p>
        </div>
    </body>
</html>
