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
        Schema::create('films', function (Blueprint $table) {
    $table->id();
    $table->string('judul', 30);
    $table->string('jam_tayang', 10);
    $table->string('durasi', 10);
    $table->string('sutradara', 30);
    $table->string('pemeran_utama', 30);
    $table->string('bahasa', 30);
    $table->date('tanggal_rilis');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
