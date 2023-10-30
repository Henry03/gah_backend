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
                'jumlah_uang_jaminan' => 450000,
            ],[
                'id' => 2,
                'jumlah_uang_jaminan' => 1800000,
            ],[
                'id' => 3,
                'jumlah_uang_jaminan' => 360000,
            ],[
                'id' => 4,
                'jumlah_uang_jaminan' => 420000,
            ],[
                'id' => 5,
                'jumlah_uang_jaminan' => 420000,
            ]
        ];

        DB::table('uang_jaminan')->insert($uang_jaminan);
    }
}
