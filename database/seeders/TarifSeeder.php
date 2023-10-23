<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tarif = [
            [
                'id' => 1,
                'id_jenis_kamar' => 1,
                'id_season' => 1,
                'tarif' => 90000,
            ],[
                'id' => 2,
                'id_jenis_kamar' => 2,
                'id_season' => 1,
                'tarif' => 180000,
            ],[
                'id' => 3,
                'id_jenis_kamar' => 3,
                'id_season' => 1,
                'tarif' => 450000,
            ],[
                'id' => 4,
                'id_jenis_kamar' => 4,
                'id_season' => 1,
                'tarif' => 900000,
            ]
        ];

        DB::table('tarif')->insert($tarif);
    }
}
