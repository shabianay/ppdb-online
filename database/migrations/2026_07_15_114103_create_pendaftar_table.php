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
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('jalur_pendaftaran_id')->nullable()->constrained('jalur_pendaftaran')->nullOnDelete();
            $table->foreignId('gelombang_id')->nullable()->constrained('gelombang')->nullOnDelete();
            $table->string('nisn', 20)->nullable();
            $table->string('nik', 16)->nullable();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->enum('status', ['draft', 'menunggu_verifikasi', 'diverifikasi', 'ditolak', 'diterima'])->default('draft');
            $table->text('catatan_verifikasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
};
