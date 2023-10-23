<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservasi = [
            [
                'id' => 1,
                'id_pegawai' => NULL,
                'id_customer' => 1,
                'id_deposit' => 1,
                'id_promo' => 1,
                'id_uang_jaminan' => 1,
                'id_booking' => 'P230923-1',
                'tgl_reservasi' => '2023-09-21',
                'check_in' => '2023-10-01',
                'check_out' => '2023-10-02',
                'kota' => 'Yogyakarta',
                'jumlah_dewasa' => 2,
                'jumlah_anak' => 1,
                'status_reservasi' => 'Selesai',
            ],[
                'id' => 2,
                'id_pegawai' => 4,
                'id_customer' => 2,
                'id_deposit' => 2,
                'id_promo' => NULL,
                'id_uang_jaminan' => 2,
                'id_booking' => 'G160923-1',
                'tgl_reservasi' => '2023-09-15',
                'check_in' => '2023-09-27',
                'check_out' => '2023-09-29',
                'kota' => 'Yogyakarta',
                'jumlah_dewasa' => 15,
                'jumlah_anak' => 0,
                'status_reservasi' => 'Selesai',
            ],[
                'id' => 3,
                'id_pegawai' => 4,
                'id_customer' => 3,
                'id_deposit' => 3,
                'id_promo' => NULL,
                'id_uang_jaminan' => 3,
                'id_booking' => 'G230923-2',
                'tgl_reservasi' => '2023-09-23',
                'check_in' => '2023-10-03',
                'check_out' => '2023-10-05',
                'kota' => 'Yogyakarta',
                'jumlah_dewasa' => 8,
                'jumlah_anak' => 0,
                'status_reservasi' => 'Check In',
            ],[
                'id' => 4,
                'id_pegawai' => NULL,
                'id_customer' => 4,
                'id_deposit' => NULL,
                'id_promo' => NULL,
                'id_uang_jaminan' => 4,
                'id_booking' => 'G021023-1',
                'tgl_reservasi' => '2023-10-02',
                'check_in' => '2023-10-10',
                'check_out' => '2023-10-13',
                'kota' => 'Yogyakarta',
                'jumlah_dewasa' => 1,
                'jumlah_anak' => 0,
                'status_reservasi' => 'Aktif',
            ],[
                'id' => 5,
                'id_pegawai' => NULL,
                'id_customer' => 5,
                'id_deposit' => NULL,
                'id_promo' => NULL,
                'id_uang_jaminan' => NULL,
                'id_booking' => 'P290923-1',
                'tgl_reservasi' => '2023-09-29',
                'check_in' => '2023-10-14',
                'check_out' => '2023-10-15',
                'kota' => 'Yogyakarta',
                'jumlah_dewasa' => 1,
                'jumlah_anak' => 1,
                'status_reservasi' => 'Aktif',
            ],[
                'id' => 6,
                'id_pegawai' => NULL,
                'id_customer' => 1,
                'id_deposit' => 4,
                'id_promo' => NULL,
                'id_uang_jaminan' => 5,
                'id_booking' => 'P020923-3',
                'tgl_reservasi' => '2023-09-02',
                'check_in' => '2023-09-17',
                'check_out' => '2023-09-18',
                'kota' => 'Yogyakarta',
                'jumlah_dewasa' => 1,
                'jumlah_anak' => 1,
                'status_reservasi' => 'Selesai',
            ]
            
        ];

        DB::table('reservasi')->insert($reservasi);
    }
}
