<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Pendaftaran {{ $pendaftar->nama_lengkap }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #333;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        .card {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 24px;
            color: #2c3e50;
            margin: 0;
        }
        .header p {
            font-size: 14px;
            color: #7f8c8d;
            margin-top: 5px;
        }
        .section-title {
            font-size: 18px;
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .detail-row {
            display: flex;
            margin-bottom: 10px;
        }
        .detail-row span {
            flex: 1;
            font-size: 14px;
        }
        .detail-row strong {
            flex: 1.5;
            font-size: 14px;
            font-weight: normal;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #95a5a6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Kartu Pendaftaran PPDB Online</h1>
            <p>{{ config('app.name', 'PPDB Online') }} - {{ date('Y') }}</p>
        </div>

        <div class="card">
            <h2 class="section-title">Data Calon Peserta Didik</h2>
            <div class="detail-row">
                <span>Nama Lengkap:</span>
                <strong>{{ $pendaftar->nama_lengkap }}</strong>
            </div>
            <div class="detail-row">
                <span>NISN:</span>
                <strong>{{ $pendaftar->nisn }}</strong>
            </div>
            <div class="detail-row">
                <span>NIK:</span>
                <strong>{{ $pendaftar->nik }}</strong>
            </div>
            <div class="detail-row">
                <span>Tempat, Tanggal Lahir:</span>
                <strong>{{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d M Y') }}</strong>
            </div>
            <div class="detail-row">
                <span>Jenis Kelamin:</span>
                <strong>{{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</strong>
            </div>
            <div class="detail-row">
                <span>Alamat:</span>
                <strong>{{ $pendaftar->alamat }}</strong>
            </div>
            <div class="detail-row">
                <span>Asal Sekolah:</span>
                <strong>{{ $pendaftar->asal_sekolah }}</strong>
            </div>
            <div class="detail-row">
                <span>Jalur Pendaftaran:</span>
                <strong>{{ $pendaftar->jalurPendaftaran->nama ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>Gelombang:</span>
                <strong>{{ $pendaftar->gelombang->nama ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>Tanggal Daftar:</span>
                <strong>{{ \Carbon\Carbon::parse($pendaftar->created_at)->format('d M Y H:i') }}</strong>
            </div>
            <div class="detail-row">
                <span>Status Pendaftaran:</span>
                <strong>{{ ucfirst($pendaftar->status) }}</strong>
            </div>
        </div>

        <div class="card">
            <h2 class="section-title">Data Orang Tua / Wali</h2>
            @if($pendaftar->orangTua->where('jenis', 'ayah')->first())
            @php $ayah = $pendaftar->orangTua->where('jenis', 'ayah')->first(); @endphp
            <h3 style="font-size: 16px; margin-top: 15px; margin-bottom: 10px;">Ayah</h3>
            <div class="detail-row">
                <span>Nama:</span>
                <strong>{{ $ayah->nama }}</strong>
            </div>
            <div class="detail-row">
                <span>Pekerjaan:</span>
                <strong>{{ $ayah->pekerjaan }}</strong>
            </div>
            <div class="detail-row">
                <span>Penghasilan:</span>
                <strong>{{ $ayah->penghasilan }}</strong>
            </div>
            <div class="detail-row">
                <span>No. HP:</span>
                <strong>{{ $ayah->no_hp }}</strong>
            </div>
            @endif

            @if($pendaftar->orangTua->where('jenis', 'ibu')->first())
            @php $ibu = $pendaftar->orangTua->where('jenis', 'ibu')->first(); @endphp
            <h3 style="font-size: 16px; margin-top: 15px; margin-bottom: 10px;">Ibu</h3>
            <div class="detail-row">
                <span>Nama:</span>
                <strong>{{ $ibu->nama }}</strong>
            </div>
            <div class="detail-row">
                <span>Pekerjaan:</span>
                <strong>{{ $ibu->pekerjaan }}</strong>
            </div>
            <div class="detail-row">
                <span>Penghasilan:</span>
                <strong>{{ $ibu->penghasilan }}</strong>
            </div>
            <div class="detail-row">
                <span>No. HP:</span>
                <strong>{{ $ibu->no_hp }}</strong>
            </div>
            @endif
        </div>

        <div class="footer">
            <p>Dokumen ini dicetak otomatis dari Sistem PPDB Online.</p>
            <p>Mohon simpan baik-baik sebagai bukti pendaftaran.</p>
        </div>
    </div>
</body>
</html>
