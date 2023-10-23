<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasiKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservasi_kamar = [
            [
                'id' => 1,
                'id_kamar' => 301,
                'id_reservasi' => 1,
            ],[
                'id' => 2,
                'id_kamar' => 101,
                'id_reservasi' => 2,
            ],[
                'id' => 3,
                'id_kamar' => 102,
                'id_reservasi' => 2,
            ],[
                'id' => 4,
                'id_kamar' => 103,
                'id_reservasi' => 2,
            ],[
                'id' => 5,
                'id_kamar' => 104,
                'id_reservasi' => 2,
            ],[
                'id' => 6,
                'id_kamar' => 105,
                'id_reservasi' => 2,
            ],[
                'id' => 7,
                'id_kamar' => 106,
                'id_reservasi' => 2,
            ],[
                'id' => 8,
                'id_kamar' => 107,
                'id_reservasi' => 2,
            ],[
                'id' => 9,
                'id_kamar' => 108,
                'id_reservasi' => 2,
            ],[
                'id' => 10,
                'id_kamar' => 109,
                'id_reservasi' => 3,
            ],[
                'id' => 11,
                'id_kamar' => 110,
                'id_reservasi' => 3,
            ],[
                'id' => 12,
                'id_kamar' => 111,
                'id_reservasi' => 3,
            ],[
                'id' => 13,
                'id_kamar' => 112,
                'id_reservasi' => 3,
            ],[
                'id' => 14,
                'id_kamar' => 201,
                'id_reservasi' => 4,
            ],[
                'id' => 15,
                'id_kamar' => 401,
                'id_reservasi' => 5,
            ]
        ];
        DB::table('reservasi_kamar')->insert($reservasi_kamar);
    }
}
