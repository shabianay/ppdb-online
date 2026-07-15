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
        Schema::create('dokumen_persyaratan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jalur_pendaftaran_id')->constrained('jalur_pendaftaran')->cascadeOnDelete();
            $table->string('nama');
            $table->text('keterangan')->nullable();
            $table->boolean('wajib')->default(true);
            $table->string('format_file')->default('jpg,png,pdf');
            $table->integer('max_size')->default(2048);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_persyaratan');
    }
};
