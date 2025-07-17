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
        Schema::create('penggunas', function (Blueprint $table) {
    $table->id();
    $table->string('nama', 30);
    $table->string('no_telepon', 20);
    $table->unsignedBigInteger('karyawan_id')->nullable();
    $table->timestamps();

    $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('set null');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
