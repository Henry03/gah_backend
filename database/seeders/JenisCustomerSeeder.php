<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_customer = [
            [
                'id' => 1,
                'nama_jenis_customer' => 'Personal',
            ],[
                'id' => 2,
                'nama_jenis_customer' => 'Grup',
            ]
        ];

        DB::table('jenis_customer')->insert($jenis_customer);
    }
}
