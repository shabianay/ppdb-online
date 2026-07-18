<p align="center">
    <img src="https://img.shields.io/badge/Laravel-12-red" alt="Laravel 12">
    <img src="https://img.shields.io/badge/PHP-^8.2-blue" alt="PHP ^8.2">
    <img src="https://img.shields.io/badge/Tailwind_CSS-3-06B6D4" alt="Tailwind CSS 3">
    <img src="https://img.shields.io/badge/Alpine.js-3-77C1D2" alt="Alpine.js 3">
    <img src="https://img.shields.io/badge/license-MIT-green" alt="MIT License">
</p>

# PPDB Online

**Sistem Penerimaan Peserta Didik Baru secara online** — aplikasi berbasis web untuk mengelola seluruh proses PPDB mulai dari pendaftaran, verifikasi berkas, pembayaran, seleksi, hingga pengumuman hasil secara digital, transparan, dan akuntabel.

---

## Fitur

### Landing Page (Publik)
- Informasi PPDB, jadwal, dan alur pendaftaran
- Jalur pendaftaran (Zonasi, Afirmasi, Perpindahan Tugas, Prestasi) dengan detail kuota dan persyaratan
- FAQ interaktif
- Berita dan pengumuman
- Form kontak dan informasi kontak panitia
- Desain responsif, dark mode, transisi halus

### Pendaftaran (Calon Siswa)
- Dashboard dengan ringkasan status pendaftaran
- Multi-step form pendaftaran (5 langkah) dengan auto-save
- Data diri, data orang tua, pilihan jalur & gelombang
- Unggah dokumen persyaratan per jalur
- Cetak kartu pendaftaran (PDF)
- Tagihan dan pembayaran (upload bukti transfer)
- Notifikasi dalam aplikasi

### Panel Admin
- Dashboard dengan statistik dan grafik (Chart.js)
- Manajemen jalur pendaftaran, gelombang, dokumen persyaratan
- Verifikasi berkas pendaftar dan dokumen
- Manajemen pengumuman
- Manajemen pengguna
- Proses seleksi dan pengumuman hasil
- Laporan data pendaftar dan keuangan (Excel & PDF)
- Pengaturan PPDB (jadwal, kuota, status aktif)
- Audit log aktivitas

---

## Tech Stack

| Layer | Teknologi |
|---|---|
| **Backend** | Laravel 12, PHP ^8.2 |
| **Frontend** | Blade, Alpine.js 3.x, Tailwind CSS 3.x |
| **Database** | MySQL |
| **Build** | Vite 7.x, laravel-vite-plugin |
| **PDF** | barryvdh/laravel-dompdf |
| **Chart** | Chart.js 4.x |
| **Auth** | Laravel Breeze 2.x (kustom) |

---

## Persyaratan Sistem

- PHP ^8.2
- Composer 2.x
- Node.js ^18 / ^20
- MySQL 8.0+
- Ekstensi PHP: `BCMath`, `Ctype`, `Fileinfo`, `JSON`, `Mbstring`, `OpenSSL`, `PDO`, `Tokenizer`, `XML`, `GD` atau `Imagick`

---

## Instalasi

```bash
# 1. Clone repositori
git clone https://github.com/username/ppdb-online.git
cd ppdb-online

# 2. Install dependensi PHP
composer install

# 3. Install dependensi Node
npm install

# 4. Copy environment
cp .env.example .env

# 5. Generate app key
php artisan key:generate

# 6. Konfigurasi database di .env
# DB_DATABASE=ppdb_online
# DB_USERNAME=root
# DB_PASSWORD=

# 7. Jalankan migrasi dan seeder
php artisan migrate --seed

# 8. Buat storage link
php artisan storage:link

# 9. Build assets
npm run build

# 10. Jalankan aplikasi
php artisan serve
```

---

## Akun Default

Setelah menjalankan `php artisan migrate --seed`, akun berikut tersedia:

| Email | Password | Role |
|---|---|---|
| `super@ppdb.com` | `password` | Super Admin |
| `admin@ppdb.com` | `password` | Admin |
| `panitia@ppdb.com` | `password` | Panitia |
| `bendahara@ppdb.com` | `password` | Bendahara |
| `kepsek@ppdb.com` | `password` | Kepala Sekolah |
| `siswa@ppdb.com` | `password` | Calon Siswa |

---

## Roles & Hak Akses

| Role | Akses |
|---|---|
| **Calon Siswa** | Dashboard pendaftaran, upload dokumen, tagihan, notifikasi |
| **Admin** | Manajemen penuh panel admin |
| **Panitia** | Verifikasi berkas, seleksi, pengumuman |
| **Bendahara** | Manajemen tagihan, verifikasi pembayaran |
| **Kepala Sekolah** | Laporan, pengesahan hasil seleksi |
| **Super Admin** | Seluruh akses termasuk manajemen pengguna & pengaturan sistem |

---

## Lisensi

Sistem ini dirilis di bawah lisensi **MIT License**.

---

Dibangun dengan [Laravel](https://laravel.com) dan [Tailwind CSS](https://tailwindcss.com).
