<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promo = [
            [
                'id' => 1,
                'id_status_promo' => 1,
                'nama_promo' => 'Promo 1',
                'kode' => 'PROMO1',
                'tanggal_mulai' => '2023-01-01',
                'tanggal_berakhir' => '2023-12-31',
                'potongan_harga' => 10000,
            ],
            [
                'id' => 2,
                'id_status_promo' => 1,
                'nama_promo' => 'Promo 2',
                'kode' => 'PROMO2',
                'tanggal_mulai' => '2021-02-01',
                'tanggal_berakhir' => '2021-02-28',
                'potongan_harga' => 20000,
            ],
            [
                'id' => 3,
                'id_status_promo' => 1,
                'nama_promo' => 'Promo 3',
                'kode' => 'PROMO3',
                'tanggal_mulai' => '2021-03-01',
                'tanggal_berakhir' => '2021-03-31',
                'potongan_harga' => 30000,
            ],
            [
                'id' => 4,
                'id_status_promo' => 1,
                'nama_promo' => 'Promo 4',
                'kode' => 'PROMO4',
                'tanggal_mulai' => '2021-04-01',
                'tanggal_berakhir' => '2021-04-30',
                'potongan_harga' => 40000,
            ],
            [
                'id' => 5,
                'id_status_promo' => 1,
                'nama_promo' => 'Promo 5',
                'kode' => 'PROMO5',
                'tanggal_mulai' => '2021-05-01',
                'tanggal_berakhir' => '2021-05-31',
                'potongan_harga' => 50000,
            ],
            [
                'id' => 6,
                'id_status_promo' => 1,
                'nama_promo' => 'Promo 6',
                'kode' => 'PROMO6',
                'tanggal_mulai' => '2021-06-01',
                'tanggal_berakhir' => '2021-06-30',
                'potongan_harga' => 60000,
            ],
        ];

        DB::table('promo')->insert($promo);
    }
}
