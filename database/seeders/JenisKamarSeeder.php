<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_kamar = [
            [
                'id' => 1,
                'nama_jenis_kamar' => 'Superior',
                'harga' => 100000,
                'gambar' => 'superior.jpg'
            ],[
                'id' => 2,
                'nama_jenis_kamar' => 'Double Deluxe',
                'harga' => 200000,
                'gambar' => 'double-deluxe.jpg'
            ],[
                'id' => 3,
                'nama_jenis_kamar' => 'Exclusive Deluxe',
                'harga' => 500000,
                'gambar' => 'exclusive-deluxe.jpg'
            ],[
                'id' => 4,
                'nama_jenis_kamar' => 'Junior Suite',
                'harga' => 1000000,
                'gambar' => 'junior-suite.jpg'
            ]
            
        ];

        DB::table('jenis_kamar')->insert($jenis_kamar);
    }
}
