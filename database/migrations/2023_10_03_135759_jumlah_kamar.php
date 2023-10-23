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
        Schema::create('jumlah_kamar', function (Blueprint $table) {
            $table->foreignId('id_jenis_kamar')->constrained('jenis_kamar')->primary();
            $table->foreignId('id_reservasi')->constrained('reservasi')->primary();
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jumlah_kamar');
    }
};
