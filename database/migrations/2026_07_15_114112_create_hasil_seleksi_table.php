<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hasil_seleksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')->constrained('pendaftar')->cascadeOnDelete();
            $table->foreignId('jalur_pendaftaran_id')->nullable()->constrained('jalur_pendaftaran')->nullOnDelete();
            $table->enum('status', ['diterima', 'ditolak', 'cadangan'])->nullable();
            $table->integer('peringkat')->nullable();
            $table->decimal('nilai_akhir', 8, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->foreignId('diputuskan_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('diputuskan_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_seleksi');
    }
};
