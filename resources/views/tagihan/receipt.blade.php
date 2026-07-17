<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Pembayaran - {{ $pembayaran->kode_transaksi }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans antialiased bg-muted/30 p-6">
    <div class="max-w-2xl mx-auto bg-card border border-border rounded-2xl shadow-lg overflow-hidden print:shadow-none print:border-0">
        <div class="text-center border-b-2 border-primary py-6 px-8">
            <h1 class="text-xl font-bold text-foreground uppercase tracking-wide">Kwitansi Pembayaran</h1>
            <p class="text-sm text-muted-foreground mt-1">{{ config('app.name', 'PPDB Online') }} - {{ date('Y') }}</p>
        </div>

        <div class="px-8 py-5">
            <div class="text-right mb-5">
                <span class="text-sm text-muted-foreground">No. </span>
                <strong class="text-foreground">{{ $pembayaran->kode_transaksi }}</strong>
            </div>

            <div class="mb-5">
                <h3 class="text-sm font-semibold text-foreground border-b border-border pb-2 mb-3">Data Penerima Pembayaran</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <span class="text-muted-foreground">Nama Sekolah</span>
                    <strong class="text-foreground">{{ config('app.name', 'PPDB Online') }}</strong>
                    <span class="text-muted-foreground">Alamat</span>
                    <strong class="text-foreground">Jl. Pendidikan No. 123, Kota</strong>
                </div>
            </div>

            <div class="mb-5">
                <h3 class="text-sm font-semibold text-foreground border-b border-border pb-2 mb-3">Data Pembayar</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <span class="text-muted-foreground">Nama Pendaftar</span>
                    <strong class="text-foreground">{{ $pembayaran->tagihan->pendaftar->nama_lengkap }}</strong>
                    <span class="text-muted-foreground">NISN</span>
                    <strong class="text-foreground">{{ $pembayaran->tagihan->pendaftar->nisn }}</strong>
                    <span class="text-muted-foreground">Jenis Tagihan</span>
                    <strong class="text-foreground">{{ $pembayaran->tagihan->jenis_tagihan ?? 'Biaya Pendaftaran' }}</strong>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-sm font-semibold text-foreground border-b border-border pb-2 mb-3">Detail Pembayaran</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <span class="text-muted-foreground">Tanggal Bayar</span>
                    <strong class="text-foreground">{{ \Carbon\Carbon::parse($pembayaran->created_at)->format('d/m/Y H:i') }}</strong>
                    <span class="text-muted-foreground">Metode Pembayaran</span>
                    <strong class="text-foreground">{{ ucfirst(str_replace('_', ' ', $pembayaran->metode)) }}</strong>
                    <span class="text-muted-foreground">Status</span>
                    <strong class="text-foreground">{{ ucfirst(str_replace('_', ' ', $pembayaran->status)) }}</strong>
                </div>
            </div>

            <div class="bg-muted/70 border border-border rounded-xl p-5 text-center">
                <p class="text-sm text-muted-foreground">Total Pembayaran</p>
                <p class="text-2xl font-bold text-foreground mt-1">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</p>
            </div>

            <div class="text-center mt-8 pt-5 border-t border-border text-xs text-muted-foreground space-y-0.5">
                <p>Dokumen ini adalah bukti pembayaran yang sah dari Sistem PPDB Online.</p>
                <p>Simpan dokumen ini untuk keperluan registrasi ulang.</p>
            </div>
        </div>
    </div>

    <div class="text-center mt-4 print:hidden">
        <button onclick="window.print()" class="px-6 py-2.5 bg-primary text-primary-foreground font-semibold rounded-xl hover:opacity-90 transition-all text-sm shadow-sm">
            Cetak Kwitansi
        </button>
    </div>
</body>
</html>
