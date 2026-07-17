@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{-- Greeting Header --}}
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">
            Selamat {{ now()->hour < 12 ? 'Pagi' : (now()->hour < 18 ? 'Siang' : 'Malam') }}, {{ Auth::user()->name }} 👋
        </h1>
        <p class="text-muted-foreground mt-1 text-sm sm:text-base">Berikut ringkasan data PPDB hari ini.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 mb-8">
        {{-- Total Pendaftar --}}
        <div class="group relative bg-card rounded-2xl shadow-sm border border-border p-5 hover:shadow-md transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-blue-500/5 rounded-bl-full -z-0"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/20 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zM12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                    </div>
                    <span class="text-xs font-medium text-emerald-600 bg-emerald-50 dark:bg-emerald-500/10 dark:text-emerald-400 px-2 py-1 rounded-full">+12%</span>
                </div>
                <p class="text-sm font-medium text-muted-foreground">Total Pendaftar</p>
                <p class="text-2xl sm:text-3xl font-bold text-foreground mt-1">{{ number_format($totalPendaftar ?? 0) }}</p>
            </div>
        </div>

        {{-- Pending Verifikasi --}}
        <div class="group relative bg-card rounded-2xl shadow-sm border border-border p-5 hover:shadow-md transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-amber-500/5 rounded-bl-full -z-0"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center shadow-lg shadow-amber-500/20 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    @if (($pendingVerifikasi ?? 0) > 0)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400">
                            {{ $pendingVerifikasi }} baru
                        </span>
                    @endif
                </div>
                <p class="text-sm font-medium text-muted-foreground">Pending Verifikasi</p>
                <p class="text-2xl sm:text-3xl font-bold text-foreground mt-1">{{ number_format($pendingVerifikasi ?? 0) }}</p>
            </div>
        </div>

        {{-- Total Pembayaran --}}
        <div class="group relative bg-card rounded-2xl shadow-sm border border-border p-5 hover:shadow-md transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-500/5 rounded-bl-full -z-0"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-lg shadow-emerald-500/20 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <span class="text-xs font-medium text-emerald-600 bg-emerald-50 dark:bg-emerald-500/10 dark:text-emerald-400 px-2 py-1 rounded-full">Terbayar</span>
                </div>
                <p class="text-sm font-medium text-muted-foreground">Total Pembayaran</p>
                <p class="text-2xl sm:text-3xl font-bold text-foreground mt-1">Rp {{ number_format($totalPembayaran ?? 0) }}</p>
            </div>
        </div>

        {{-- Total User --}}
        <div class="group relative bg-card rounded-2xl shadow-sm border border-border p-5 hover:shadow-md transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-purple-500/5 rounded-bl-full -z-0"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-purple-500 to-violet-600 flex items-center justify-center shadow-lg shadow-purple-500/20 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-muted-foreground">Total User</p>
                <p class="text-2xl sm:text-3xl font-bold text-foreground mt-1">{{ number_format($totalUser ?? 0) }}</p>
            </div>
        </div>
    </div>

    {{-- Chart + Quick Actions --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-8">
        {{-- Chart --}}
        <div class="lg:col-span-2 bg-card rounded-2xl shadow-sm border border-border p-5">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-base font-semibold text-foreground">Grafik Pendaftar</h3>
                    <p class="text-xs text-muted-foreground mt-0.5">Jumlah pendaftar per minggu</p>
                </div>
                <select class="text-sm border-border bg-card rounded-lg text-foreground focus:ring-ring focus:border-ring py-1.5 px-3">
                    <option>7 Hari Terakhir</option>
                    <option>30 Hari Terakhir</option>
                    <option>3 Bulan Terakhir</option>
                </select>
            </div>
            <div class="relative h-64">
                <canvas id="pendaftarChart"></canvas>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-card rounded-2xl shadow-sm border border-border p-5">
            <h3 class="text-base font-semibold text-foreground mb-4">Aksi Cepat</h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('admin.verifikasi.index') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-amber-200 dark:border-amber-500/20 bg-amber-50/50 dark:bg-amber-500/5 hover:bg-amber-50 dark:hover:bg-amber-500/10 hover:border-amber-300 dark:hover:border-amber-500/30 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 dark:bg-amber-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <span class="text-xs font-semibold text-amber-700 dark:text-amber-300 text-center">Verifikasi</span>
                    @if (($pendingVerifikasi ?? 0) > 0)
                        <span class="text-[10px] font-medium text-amber-600 bg-amber-100 dark:bg-amber-500/20 dark:text-amber-400 px-2 py-0.5 rounded-full">{{ $pendingVerifikasi }} menunggu</span>
                    @endif
                </a>

                <a href="{{ route('admin.jalur-pendaftaran.index') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-blue-200 dark:border-blue-500/20 bg-blue-50/50 dark:bg-blue-500/5 hover:bg-blue-50 dark:hover:bg-blue-500/10 hover:border-blue-300 dark:hover:border-blue-500/30 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                    </div>
                    <span class="text-xs font-semibold text-blue-700 dark:text-blue-300 text-center">Jalur</span>
                </a>

                <a href="{{ route('admin.pengumuman.index') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-purple-200 dark:border-purple-500/20 bg-purple-50/50 dark:bg-purple-500/5 hover:bg-purple-50 dark:hover:bg-purple-500/10 hover:border-purple-300 dark:hover:border-purple-500/30 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-purple-100 dark:bg-purple-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    </div>
                    <span class="text-xs font-semibold text-purple-700 dark:text-purple-300 text-center">Pengumuman</span>
                </a>

                <a href="{{ route('admin.seleksi.index') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-emerald-200 dark:border-emerald-500/20 bg-emerald-50/50 dark:bg-emerald-500/5 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:border-emerald-300 dark:hover:border-emerald-500/30 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <span class="text-xs font-semibold text-emerald-700 dark:text-emerald-300 text-center">Seleksi</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Chart Scripts --}}
    @push('scripts')
    <script>
        window.addEventListener('load', function() {
            const ctx = document.getElementById('pendaftarChart');
            if (!ctx) return;

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4', 'Minggu 5', 'Minggu 6', 'Minggu 7'],
                    datasets: [{
                        label: 'Jumlah Pendaftar',
                        data: [10, 25, 15, 30, 20, 35, 25],
                        fill: true,
                        borderColor: 'hsl(var(--primary))',
                        backgroundColor: function(context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;
                            if (!chartArea) return 'hsla(var(--primary), 0.1)';
                            const gradient = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                            gradient.addColorStop(0, 'hsla(var(--primary), 0.15)');
                            gradient.addColorStop(1, 'hsla(var(--primary), 0.01)');
                            return gradient;
                        },
                        borderWidth: 2.5,
                        tension: 0.4,
                        pointRadius: 0,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: 'hsl(var(--primary))',
                        pointHoverBorderColor: 'white',
                        pointHoverBorderWidth: 2,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'hsl(var(--foreground))',
                            titleColor: 'hsl(var(--background))',
                            bodyColor: 'hsl(var(--background))',
                            borderColor: 'hsl(var(--border))',
                            borderWidth: 1,
                            cornerRadius: 12,
                            padding: 12,
                            titleFont: { weight: '600' },
                            displayColors: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'hsla(var(--border), 0.5)', drawBorder: false },
                            ticks: { color: 'hsl(var(--muted-foreground))', padding: 8 },
                            border: { display: false },
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: 'hsl(var(--muted-foreground))', padding: 8 },
                            border: { display: false },
                        }
                    }
                }
            });
        });
    </script>
    @endpush
@endsection
