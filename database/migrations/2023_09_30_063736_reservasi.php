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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pegawai')->nullable()->constrained('pegawai');
            $table->foreignId('id_customer')->constrained('customer');
            $table->foreignId('id_deposit')->nullable()->constrained('deposit');
            $table->foreignId('id_promo')->nullable()->constrained('promo');
            $table->foreignId('id_uang_jaminan')->nullable()->constrained('uang_jaminan');
            $table->string('id_booking')->nullable();
            $table->datetime('tgl_reservasi');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('kota');
            $table->string('jumlah_dewasa');
            $table->string('jumlah_anak');
            $table->string('status_reservasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
