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
            $table->enum('metode_pembayaran', ['QRIS', 'Tunai']); // Pilihan metode pembayaran
            $table->decimal('total_bayar', 10, 2);
            $table->decimal('kembalian', 10, 2)->nullable(); // Jika menggunakan tunai
        
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
