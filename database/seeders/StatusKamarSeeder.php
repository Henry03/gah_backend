<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status_kamar = [
            [
                'id' => 1,
                'status' => 'Kosong',
            ],[
                'id' => 2,
                'status' => 'Terisi',
            ],[
                'id' => 3,
                'status' => 'Dalam Perbaikan',
            ]
        ];

        DB::table('status_kamar')->insert($status_kamar);
    }
}
