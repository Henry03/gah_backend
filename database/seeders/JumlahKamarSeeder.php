<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JumlahKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jumlah_kamar = [
            [
                'id_reservasi' => 1,
                'id_jenis_kamar' => 3,
                'jumlah' => 1,
            ],[
                'id_reservasi' => 2,
                'id_jenis_kamar' => 1,
                'jumlah' => 8,
            ],[
                'id_reservasi' => 3,
                'id_jenis_kamar' => 1,
                'jumlah' => 4,
            ],[
                'id_reservasi' => 4,
                'id_jenis_kamar' => 2,
                'jumlah' => 1,
            ],[
                'id_reservasi' => 5,
                'id_jenis_kamar' => 4,
                'jumlah' => 1,
            ],[
                'id_reservasi' => 6,
                'id_jenis_kamar' => 4,
                'jumlah' => 1,
            ],
        ];
        DB::table('jumlah_kamar')->insert($jumlah_kamar);
    }
}
