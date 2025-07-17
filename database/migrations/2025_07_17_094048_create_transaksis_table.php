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
        Schema::create('transaksis', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal_transaksi');
    $table->string('metode_pembayaran', 30);
    $table->decimal('total_pembayaran', 10, 2);
    $table->unsignedBigInteger('pengguna_id');
    $table->unsignedBigInteger('tiket_id');
    $table->timestamps();

    $table->foreign('pengguna_id')->references('id')->on('penggunas')->onDelete('cascade');
    $table->foreign('tiket_id')->references('id')->on('tikets')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
