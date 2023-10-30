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
                'tipe_season' => 'Promo',
                'nama_season' => 'Tahun Baru 2023',
                'tanggal_mulai' => '2023-09-01',
                'tanggal_selesai' => '2023-10-31',
            ],[
                'id' => 2,
                'tipe_season' => 'Normal',
                'nama_season' => 'Merry Christmas 2023',
                'tanggal_mulai' => '2023-11-01',
                'tanggal_selesai' => '2023-12-31',
            ],[
                'id' => 3,
                'tipe_season' => 'High Season',
                'nama_season' => 'Lebaran 2024',
                'tanggal_mulai' => '2024-01-01',
                'tanggal_selesai' => '2024-02-29',
            ]
            
        ];

        DB::table('season')->insert($season);
    }
}
