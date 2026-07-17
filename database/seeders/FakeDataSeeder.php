<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pendaftar;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use App\Models\JalurPendaftaran;
use App\Models\Gelombang;
use App\Models\Pengumuman;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FakeDataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Authenticate as admin to avoid activity log null user_id
        $admin = User::where('role', 'super_admin')->first() ?? User::first();
        if ($admin) {
            auth()->login($admin);
        }

        // 1. Ensure Jalur Pendaftaran exists
        $jalurIds = JalurPendaftaran::pluck('id')->toArray();
        if (empty($jalurIds)) {
            $jalurs = [
                ['kode' => 'ZON', 'nama' => 'Zonasi'],
                ['kode' => 'AFR', 'nama' => 'Afirmasi'],
                ['kode' => 'PRS', 'nama' => 'Prestasi'],
                ['kode' => 'POT', 'nama' => 'Perpindahan Orang Tua'],
            ];
            foreach ($jalurs as $j) {
                $jalur = JalurPendaftaran::create([
                    'kode' => $j['kode'],
                    'nama' => $j['nama'],
                    'tanggal_mulai' => now(),
                    'tanggal_selesai' => now()->addMonths(2),
                ]);
                $jalurIds[] = $jalur->id;
            }
        }

        // 2. Ensure Gelombang exists
        $gelombangIds = Gelombang::pluck('id')->toArray();
        if (empty($gelombangIds)) {
            $gelombang = Gelombang::create([
                'nama' => 'Gelombang 1',
                'tanggal_mulai' => now(),
                'tanggal_selesai' => now()->addMonths(2),
            ]);
            $gelombangIds[] = $gelombang->id;
        }

        // 3. Generate Users & Pendaftar
        for ($i = 0; $i < 50; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'role' => 'calon_siswa',
                'no_hp' => $faker->phoneNumber,
                'email_verified_at' => now(),
            ]);

            $pendaftar = $pendaftar = Pendaftar::create([
                'user_id' => $user->id,
                'nisn' => $faker->unique()->numerify('##########'),
                'nik' => $faker->unique()->numerify('################'),
                'nama_lengkap' => $user->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2010-01-01'),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'alamat' => $faker->address,
                'asal_sekolah' => $faker->company . ' ' . $faker->word,
                'no_hp' => $user->no_hp,
                'jalur_pendaftaran_id' => $faker->randomElement($jalurIds),
                'gelombang_id' => $faker->randomElement($gelombangIds),
                'status' => $faker->randomElement(['draft', 'menunggu_verifikasi', 'diverifikasi', 'ditolak', 'diterima']),
            ]);

            // 4. Generate Tagihan for each pendaftar
            $tagihan = Tagihan::create([
                'pendaftar_id' => $pendaftar->id,
                'kode' => 'INV-' . Str::upper(Str::random(8)),
                'jenis_biaya' => 'Pendaftaran',
                'nominal' => $faker->randomElement([150000, 200000, 250000]),
                'jatuh_tempo' => now()->addDays(7),
                'status' => $pendaftar->status === 'diterima' ? 'lunas' : 'belum_bayar',
            ]);

            // 5. Generate Pembayaran for lunas tagihan
            if ($tagihan->status === 'lunas') {
                Pembayaran::create([
                    'tagihan_id' => $tagihan->id,
                    'kode_transaksi' => 'TRX-' . Str::upper(Str::random(10)),
                    'jumlah' => $tagihan->nominal,
                    'metode' => $faker->randomElement(['virtual_account', 'e_wallet', 'qris', 'transfer_manual']),
                    'status' => 'lunas',
                    'verified_at' => now(),
                ]);
            }
        }

        // 6. Generate Pengumuman
        $admin = User::where('role', 'admin')->first() ?? User::first();
        for ($i = 0; $i < 5; $i++) {
            Pengumuman::create([
                'user_id' => $admin->id,
                'judul' => $faker->sentence,
                'konten' => $faker->paragraphs(3, true),
                'tipe' => $faker->randomElement(['info', 'pengumuman', 'artikel']),
                'dipublikasikan' => true,
                'tanggal_terbit' => now(),
            ]);
        }
    }
}