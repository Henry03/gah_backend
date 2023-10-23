<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status_promo = [
            [
                'id' => 1,
                'status_promo' => 'Aktif',
            ],[
                'id' => 2,
                'status_promo' => 'Tidak Aktif',
            ]
        ];
        DB::table('status_promo')->insert($status_promo);
    }
}
