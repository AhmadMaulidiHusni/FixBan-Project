<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id'); // Foreign key ke tabel transaksi
            $table->string('nama_pelanggan');
            $table->string('jasa');
            $table->decimal('harga', 15, 2);
            $table->date('tanggal');
            $table->string('metode_pembayaran'); // Transfer Bank atau Cash
            $table->string('status_pembayaran')->default('Belum Dibayar'); // Status pembayaran
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
