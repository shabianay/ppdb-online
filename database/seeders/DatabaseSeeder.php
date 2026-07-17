<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Calon Siswa',
            'email' => 'siswa@ppdb.com',
            'role' => 'calon_siswa',
        ]);

        User::factory()->create([
            'name' => 'Admin PPDB',
            'email' => 'admin@ppdb.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Panitia',
            'email' => 'panitia@ppdb.com',
            'role' => 'panitia',
        ]);

        User::factory()->create([
            'name' => 'Bendahara',
            'email' => 'bendahara@ppdb.com',
            'role' => 'bendahara',
        ]);

        User::factory()->create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@ppdb.com',
            'role' => 'kepala_sekolah',
        ]);

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@ppdb.com',
            'role' => 'super_admin',
        ]);

        $this->call([
            FakeDataSeeder::class,
        ]);
    }
}
