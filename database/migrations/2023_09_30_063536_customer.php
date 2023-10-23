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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis_customer')->constrained('jenis_customer');
            $table->string('no_identitas');
            $table->string('jenis_identitas');
            $table->string('nama_institusi')->nullable();
            $table->string('nama');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('no_telp');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropifexists('customer');
    }
};
