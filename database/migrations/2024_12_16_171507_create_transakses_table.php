<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) { // Perbaiki nama tabel menjadi transaksis
            $table->id();
            $table->string('nama_pelanggan'); // Nama pelanggan
            $table->string('jasa');          // Jasa yang digunakan
            $table->date('tanggal');         // Tanggal transaksi
            $table->decimal('harga', 15, 2); // Harga
            $table->string('status')->default('pending'); // Status transaksi: pending, accepted, rejected
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
