<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $season = [
            [
                'id' => 1,
                'nama_season' => 'Promo',
                'tanggal_mulai' => '2023-09-01',
                'tanggal_selesai' => '2023-10-31',
            ],[
                'id' => 2,
                'nama_season' => 'Normal',
                'tanggal_mulai' => '2023-11-01',
                'tanggal_selesai' => '2023-12-31',
            ],[
                'id' => 3,
                'nama_season' => 'High Season',
                'tanggal_mulai' => '2024-01-01',
                'tanggal_selesai' => '2024-02-29',
            ]
            
        ];

        DB::table('season')->insert($season);
    }
}
