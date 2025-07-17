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
        Schema::create('studios', function (Blueprint $table) {
    $table->id();
    $table->string('nomor_studio', 10);
    $table->integer('kapasitas');
    $table->string('tipe_studio', 30);
    $table->unsignedBigInteger('tiket_id')->nullable();
    $table->timestamps();

    $table->foreign('tiket_id')->references('id')->on('tikets')->onDelete('set null');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studios');
    }
};
