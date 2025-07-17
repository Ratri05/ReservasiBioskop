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
        Schema::create('tikets', function (Blueprint $table) {
    $table->id();
    $table->string('nomor_kursi', 10);
    $table->string('jam_tayang', 10);
    $table->enum('status', ['tersedia', 'terpesan']);
    $table->decimal('harga', 10, 2);
    $table->unsignedBigInteger('film_id');
    $table->timestamps();

    $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
