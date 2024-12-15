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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_layanan');
            $table->unsignedBigInteger('id_pembayaran');
            $table->timestamp('waktu_transaksi');
            $table->integer('jumlah_layanan');
            $table->decimal('total_harga_transaksi', 10, 2);
        
            // Relasi
            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('id_layanan')->references('id')->on('layanan')->onDelete('cascade');
            $table->foreign('id_pembayaran')->references('id')->on('pembayaran')->onDelete('cascade');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
