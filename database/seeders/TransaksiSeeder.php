<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transaksi = [
            [
                'id' => "P021023-1",
                'id_pegawai' => 5,
                'id_reservasi' => 1,
                'tgl_transaksi' => '2023-10-02',
                'pajak' => 57000,
                'diskon' => 50000,
                'total_pembayaran' => 570000,
                'jumlah_pembayaran' => -120000,
            ],[
                'id' => "G290923-1",
                'id_pegawai' => 5,
                'id_reservasi' => 2,
                'tgl_transaksi' => '2023-09-29',
                'pajak' => 294000,
                'diskon' => 160000,
                'total_pembayaran' => 2940000,
                'jumlah_pembayaran' => 1170000,
            ],[
                'id' => "G180923-1",
                'id_pegawai' => 5,
                'id_reservasi' => 6,
                'tgl_transaksi' => '2023-09-18',
                'pajak' => 90000,
                'diskon' => 100000,
                'total_pembayaran' => 990000,
                'jumlah_pembayaran' => -210000,
            ],
        ];

        DB::table('transaksi')->insert($transaksi);
    }
}
