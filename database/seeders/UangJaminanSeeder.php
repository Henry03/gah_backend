<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UangJaminanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uang_jaminan = [
            [
                'id' => 1,
                'jumlah' => 450000,
            ],[
                'id' => 2,
                'jumlah' => 1800000,
            ],[
                'id' => 3,
                'jumlah' => 360000,
            ],[
                'id' => 4,
                'jumlah' => 420000,
            ],[
                'id' => 5,
                'jumlah' => 420000,
            ]
        ];

        DB::table('uang_jaminan')->insert($uang_jaminan);
    }
}
