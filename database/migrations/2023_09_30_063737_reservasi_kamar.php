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
        Schema::create('reservasi_kamar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_reservasi')->constrained('reservasi');
            $table->foreignId('id_kamar')->constrained('kamar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi_kamar');
    }
};
