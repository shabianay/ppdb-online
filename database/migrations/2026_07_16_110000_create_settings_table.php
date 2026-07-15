<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            ['key' => 'pendaftaran_mulai', 'value' => null],
            ['key' => 'pendaftaran_selesai', 'value' => null],
            ['key' => 'seleksi_mulai', 'value' => null],
            ['key' => 'seleksi_selesai', 'value' => null],
            ['key' => 'ppdb_aktif', 'value' => '1'],
            ['key' => 'kuota_default', 'value' => '0'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
