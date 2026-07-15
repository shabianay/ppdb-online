<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('tagihan.index') }}" class="text-muted-foreground hover:text-foreground transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <h2 class="font-semibold text-xl text-foreground leading-tight">
                    {{ __('Detail Tagihan') }}
                </h2>
            </div>
        </div>
    </x-slot>

    @php
        $statusColors = [
            'belum_bayar' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400',
            'lunas' => 'bg-green-500/10 text-green-600 dark:text-green-400',
            'kadaluarsa' => 'bg-destructive/10 text-destructive',
        ];
        $statusLabel = [
            'belum_bayar' => 'Belum Dibayar',
            'lunas' => 'Lunas',
            'kadaluarsa' => 'Kadaluarsa',
        ];
        $pembayaranStatusColors = [
            'pending' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400',
            'diverifikasi' => 'bg-green-500/10 text-green-600 dark:text-green-400',
            'ditolak' => 'bg-destructive/10 text-destructive',
        ];
    @endphp

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="p-4 bg-green-500/10 border border-green-500/20 text-green-600 dark:text-green-400 rounded-2xl text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="p-4 bg-destructive/10 border border-destructive/20 text-destructive rounded-2xl text-sm">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Tagihan Info --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                <div class="px-8 py-6 border-b border-border flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-foreground">Informasi Tagihan</h3>
                    <span class="px-4 py-1.5 rounded-full text-sm font-semibold {{ $statusColors[$tagihan->status] ?? 'bg-muted text-muted-foreground' }}">
                        {{ $statusLabel[$tagihan->status] ?? $tagihan->status }}
                    </span>
                </div>
                <div class="px-8 py-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <span class="block text-sm text-muted-foreground">Kode Tagihan</span>
                            <span class="block font-medium text-foreground">{{ $tagihan->kode }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Jenis Biaya</span>
                            <span class="block font-medium text-foreground">{{ $tagihan->jenis_biaya }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Nominal</span>
                            <span class="block font-medium text-foreground text-lg">Rp {{ number_format($tagihan->nominal, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Jatuh Tempo</span>
                            <span class="block font-medium text-foreground">{{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->format('d F Y') }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Pendaftar</span>
                            <span class="block font-medium text-foreground">{{ $tagihan->pendaftar->nama_lengkap }}</span>
                        </div>
                        <div>
                            <span class="block text-sm text-muted-foreground">Status</span>
                            <span class="block font-medium {{ $tagihan->status === 'lunas' ? 'text-green-600 dark:text-green-400' : ($tagihan->status === 'kadaluarsa' ? 'text-red-600 dark:text-red-400' : 'text-yellow-600 dark:text-yellow-400') }}">
                                {{ $statusLabel[$tagihan->status] ?? $tagihan->status }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pembayaran --}}
            <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                <div class="px-8 py-6 border-b border-border">
                    <h3 class="text-lg font-semibold text-foreground">Riwayat Pembayaran</h3>
                </div>
                <div class="px-8 py-6">
                    @if ($tagihan->pembayaran->count() > 0)
                        <div class="space-y-4">
                            @foreach ($tagihan->pembayaran as $pembayaran)
                                <div class="p-4 bg-muted/50 rounded-xl">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <div class="flex items-center gap-2">
                                                <p class="text-sm font-medium text-foreground">Transaksi #{{ $pembayaran->kode_transaksi }}</p>
                                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold {{ $pembayaranStatusColors[$pembayaran->status] ?? 'bg-muted text-muted-foreground' }}">
                                                    {{ ucfirst($pembayaran->status) }}
                                                </span>
                                            </div>
                                            <div class="flex flex-wrap gap-x-6 gap-y-1 mt-2 text-xs text-muted-foreground">
                                                <span>Jumlah: Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</span>
                                                <span>Metode: {{ $pembayaran->metode ?? '-' }}</span>
                                                @if ($pembayaran->payment_gateway)
                                                    <span>Gateway: {{ $pembayaran->payment_gateway }}</span>
                                                @endif
                                                <span>Tanggal: {{ $pembayaran->created_at->format('d F Y, H:i') }}</span>
                                            </div>
                                            @if ($pembayaran->bukti_bayar)
                                                <div class="mt-2">
                                                    <a href="{{ Storage::url($pembayaran->bukti_bayar) }}" target="_blank" class="text-xs text-primary hover:underline">Lihat Bukti Bayar</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($pembayaran->status === 'ditolak' && $pembayaran->catatan_verifikasi)
                                        <div class="mt-3 p-3 bg-destructive/10 border border-destructive/20 rounded-xl">
                                            <p class="text-xs font-medium text-destructive">Catatan Verifikasi:</p>
                                            <p class="text-xs text-destructive/80 mt-0.5">{{ $pembayaran->catatan_verifikasi }}</p>
                                        </div>
                                    @endif
                                    @if ($pembayaran->verified_at)
                                        <p class="text-xs text-muted-foreground/60 mt-2">Diverifikasi pada {{ \Carbon\Carbon::parse($pembayaran->verified_at)->format('d F Y, H:i') }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6">
                            <div class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-muted flex items-center justify-center">
                                <svg class="w-7 h-7 text-muted-foreground/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <p class="text-sm text-muted-foreground">Belum ada pembayaran</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Upload Bukti Bayar --}}
            @if ($tagihan->status === 'belum_bayar')
                <div class="bg-card overflow-hidden shadow-sm sm:rounded-2xl">
                    <div class="px-8 py-6 border-b border-border">
                        <h3 class="text-lg font-semibold text-foreground">Upload Bukti Bayar</h3>
                    </div>
                    <div class="px-8 py-6">
                        <form action="{{ route('pembayaran.store', $tagihan) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div>
                                <label for="bukti_bayar" class="block text-sm font-medium text-foreground mb-2">Pilih File Bukti Bayar</label>
                                <input type="file" name="bukti_bayar" id="bukti_bayar" accept="image/*,.pdf" required
                                    class="block w-full text-sm text-muted-foreground file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                <p class="mt-1 text-xs text-muted-foreground">Format: JPG, PNG, atau PDF. Maksimal 2MB.</p>
                                @error('bukti_bayar')
                                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="catatan" class="block text-sm font-medium text-foreground mb-2">Catatan (opsional)</label>
                                <textarea name="catatan" id="catatan" rows="2" class="block w-full rounded-xl border-input bg-background text-foreground shadow-sm focus:border-ring focus:ring-ring text-sm" placeholder="Tambahkan catatan jika diperlukan"></textarea>
                            </div>
                            <div class="flex items-center gap-3">
                                <button type="submit" class="px-6 py-2.5 bg-primary text-white font-semibold rounded-xl hover:opacity-90 transition-all text-sm shadow-lg shadow-primary/25">
                                    Upload Bukti Bayar
                                </button>
                                <p class="text-xs text-muted-foreground">Pembayaran akan diverifikasi oleh admin.</p>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
