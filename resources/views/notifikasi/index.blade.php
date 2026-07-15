<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-foreground leading-tight">
                {{ __('Notifikasi') }}
            </h2>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full">
                    {{ $notifikasi->where('terbaca', false)->count() }} Belum Dibaca
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-600 dark:text-green-400 rounded-2xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Filter Kanal --}}
            <div class="mb-6 flex flex-wrap items-center gap-3">
                <span class="text-sm font-medium text-foreground">Filter:</span>
                <a href="{{ route('notifikasi.index') }}" class="px-4 py-1.5 rounded-xl text-sm font-medium {{ !request('kanal') ? 'bg-primary text-primary-foreground' : 'bg-muted text-foreground hover:bg-accent' }} transition-colors">
                    Semua
                </a>
                <a href="{{ route('notifikasi.index', ['kanal' => 'in_app']) }}" class="px-4 py-1.5 rounded-xl text-sm font-medium {{ request('kanal') === 'in_app' ? 'bg-primary text-primary-foreground' : 'bg-muted text-foreground hover:bg-accent' }} transition-colors">
                    In-App
                </a>
                <a href="{{ route('notifikasi.index', ['kanal' => 'email']) }}" class="px-4 py-1.5 rounded-xl text-sm font-medium {{ request('kanal') === 'email' ? 'bg-primary text-primary-foreground' : 'bg-muted text-foreground hover:bg-accent' }} transition-colors">
                    Email
                </a>
                <a href="{{ route('notifikasi.index', ['kanal' => 'whatsapp']) }}" class="px-4 py-1.5 rounded-xl text-sm font-medium {{ request('kanal') === 'whatsapp' ? 'bg-primary text-primary-foreground' : 'bg-muted text-foreground hover:bg-accent' }} transition-colors">
                    WhatsApp
                </a>
            </div>

            @if ($notifikasi->count() === 0)
                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="p-12 text-center">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-muted flex items-center justify-center">
                            <svg class="w-10 h-10 text-muted-foreground/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-foreground mb-2">Tidak Ada Notifikasi</h3>
                        <p class="text-muted-foreground">Belum ada notifikasi untuk Anda saat ini.</p>
                    </div>
                </div>
            @else
                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="divide-y divide-border">
                        @foreach ($notifikasi as $n)
                            <div class="px-6 py-5 hover:bg-muted/50 transition-colors {{ !$n->terbaca ? 'bg-primary/5' : '' }}">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex items-start gap-3 flex-1 min-w-0">
                                        @if (!$n->terbaca)
                                            <div class="w-2.5 h-2.5 mt-1.5 bg-primary rounded-full shrink-0"></div>
                                        @else
                                            <div class="w-2.5 h-2.5 mt-1.5 bg-transparent rounded-full shrink-0"></div>
                                        @endif
                                        <div class="min-w-0">
                                            <div class="flex items-center gap-2 flex-wrap">
                                                <h4 class="text-sm font-semibold {{ !$n->terbaca ? 'text-foreground' : 'text-foreground' }}">
                                                    {{ $n->judul }}
                                                </h4>
                                                <span class="px-2 py-0.5 rounded-full text-xs font-medium 
                                                    @if($n->kanal === 'email') bg-purple-500/10 text-purple-600 dark:text-purple-400
                                                    @elseif($n->kanal === 'whatsapp') bg-green-500/10 text-green-600 dark:text-green-400
                                                    @else bg-primary/10 text-primary
                                                    @endif">
                                                    {{ ucfirst($n->kanal === 'in_app' ? 'In-App' : $n->kanal) }}
                                                </span>
                                            </div>
                                            <p class="text-sm text-muted-foreground mt-1 {{ !$n->terbaca ? 'font-medium' : '' }}">{{ $n->isi }}</p>
                                            <div class="flex items-center gap-3 mt-2 text-xs text-muted-foreground/60">
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    {{ $n->created_at->diffForHumans() }}
                                                </span>
                                                @if ($n->status_kirim)
                                                    <span class="flex items-center gap-1">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                        {{ ucfirst($n->status_kirim) }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if (!$n->terbaca)
                                        <form action="{{ route('notifikasi.baca', $n) }}" method="POST" class="shrink-0">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 bg-primary/10 text-primary text-xs font-semibold rounded-lg hover:bg-primary/20 transition-colors">
                                                Tandai Dibaca
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if ($notifikasi instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-6">
                        {{ $notifikasi->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
