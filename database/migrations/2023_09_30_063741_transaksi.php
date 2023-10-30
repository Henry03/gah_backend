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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id_transaksi', 12)->primary();
            $table->foreignId('id_pegawai')->constrained('pegawai');
            $table->foreignId('id_reservasi')->constrained('reservasi');
            $table->datetime('tgl_transaksi');
            $table->integer('diskon');
            $table->integer('pajak');
            $table->integer('total_pembayaran');
            $table->integer('jumlah_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
