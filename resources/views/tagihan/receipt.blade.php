<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Pembayaran - {{ $pembayaran->kode_transaksi }}</title>
    <style>
        body { font-family: 'Arial', sans-serif; margin: 0; padding: 20px; color: #333; }
        .container { width: 100%; max-width: 700px; margin: 0 auto; }
        .card { border: 1px solid #ddd; border-radius: 8px; padding: 30px; }
        .header { text-align: center; border-bottom: 2px solid #2c3e50; padding-bottom: 20px; margin-bottom: 20px; }
        .header h1 { font-size: 22px; margin: 0; color: #2c3e50; }
        .header p { font-size: 12px; color: #777; margin-top: 5px; }
        .receipt-number { font-size: 14px; color: #555; text-align: right; margin-bottom: 15px; }
        .section { margin-bottom: 20px; }
        .section-title { font-size: 14px; color: #2c3e50; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-bottom: 10px; }
        .row { display: flex; margin-bottom: 8px; }
        .row span { font-size: 13px; flex: 1; }
        .row strong { font-size: 13px; flex: 1.5; }
        .total-box { background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 6px; padding: 15px; text-align: center; margin-top: 20px; }
        .total-box .label { font-size: 14px; color: #666; }
        .total-box .amount { font-size: 24px; font-weight: bold; color: #2c3e50; margin-top: 5px; }
        .footer { text-align: center; margin-top: 30px; font-size: 11px; color: #999; border-top: 1px solid #eee; padding-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>KWITANSI PEMBAYARAN</h1>
                <p>{{ config('app.name', 'PPDB Online') }} - {{ date('Y') }}</p>
            </div>

            <div class="receipt-number">
                No. <strong>{{ $pembayaran->kode_transaksi }}</strong>
            </div>

            <div class="section">
                <div class="section-title">Data Penerima Pembayaran</div>
                <div class="row"><span>Nama Sekolah</span><strong>{{ config('app.name', 'PPDB Online') }}</strong></div>
                <div class="row"><span>Alamat</span><strong>Jl. Pendidikan No. 123, Kota</strong></div>
            </div>

            <div class="section">
                <div class="section-title">Data Pembayar</div>
                <div class="row"><span>Nama Pendaftar</span><strong>{{ $pembayaran->tagihan->pendaftar->nama_lengkap }}</strong></div>
                <div class="row"><span>NISN</span><strong>{{ $pembayaran->tagihan->pendaftar->nisn }}</strong></div>
                <div class="row"><span>Jenis Tagihan</span><strong>{{ $pembayaran->tagihan->jenis_tagihan ?? 'Biaya Pendaftaran' }}</strong></div>
            </div>

            <div class="section">
                <div class="section-title">Detail Pembayaran</div>
                <div class="row"><span>Tanggal Bayar</span><strong>{{ \Carbon\Carbon::parse($pembayaran->created_at)->format('d/m/Y H:i') }}</strong></div>
                <div class="row"><span>Metode Pembayaran</span><strong>{{ ucfirst(str_replace('_', ' ', $pembayaran->metode)) }}</strong></div>
                <div class="row"><span>Status</span><strong>{{ ucfirst(str_replace('_', ' ', $pembayaran->status)) }}</strong></div>
            </div>

            <div class="total-box">
                <div class="label">Total Pembayaran</div>
                <div class="amount">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</div>
            </div>

            <div class="footer">
                <p>Dokumen ini adalah bukti pembayaran yang sah dari Sistem PPDB Online.</p>
                <p>Simpan dokumen ini untuk keperluan registrasi ulang.</p>
            </div>
        </div>
    </div>
</body>
</html>
