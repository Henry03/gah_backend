<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deposit = [
            [
                'id' => 1,
                'jumlah_deposit' => 300000,
            ],[
                'id' => 2,
                'jumlah_deposit' => 300000,
            ],[
                'id' => 3,
                'jumlah_deposit' => 300000,
            ],[
                'id' => 4,
                'jumlah_deposit' => 300000,
            ]
        ];
        DB::table('deposit')->insert($deposit);
    }
}
