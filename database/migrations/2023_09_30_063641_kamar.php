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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis_kamar')->constrained('jenis_kamar')->onDelete('cascade');
            $table->foreignId('id_status_kamar')->constrained('status_kamar')->onDelete('cascade');
            $table->string('tempat_tidur');
            $table->integer('kapasitas');
            $table->string('deskripsi');
            $table->string('rincian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
