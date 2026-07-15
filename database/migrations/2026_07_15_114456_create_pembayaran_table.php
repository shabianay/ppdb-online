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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_id')->constrained('tagihan')->cascadeOnDelete();
            $table->string('kode_transaksi')->unique();
            $table->decimal('jumlah', 15, 2);
            $table->enum('metode', ['virtual_account', 'e_wallet', 'qris', 'transfer_manual'])->nullable();
            $table->string('payment_gateway')->nullable();
            $table->string('payment_gateway_ref')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->enum('status', ['menunggu_konfirmasi', 'lunas', 'gagal'])->default('menunggu_konfirmasi');
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
