<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasiFasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservasi_fasilitas = [
            [
                'id' => 1,
                'id_fasilitas' => 1,
                'id_reservasi' => 1,
                'tgl_reservasi_fasilitas' => '2023-10-01',
                'jumlah' => 2,
            ],[
                'id' => 2,
                'id_fasilitas' => 3,
                'id_reservasi' => 1,
                'tgl_reservasi_fasilitas' => '2023-10-01',
                'jumlah' => 2,
            ],[
                'id' => 3,
                'id_fasilitas' => 3,
                'id_reservasi' => 2,
                'tgl_reservasi_fasilitas' => '2023-09-27',
                'jumlah' => 15,
            ],[
                'id' => 4,
                'id_fasilitas' => 3,
                'id_reservasi' => 2,
                'tgl_reservasi_fasilitas' => '2023-09-28',
                'jumlah' => 15,
            ]
            
        ];
        
        DB::table('reservasi_fasilitas')->insert($reservasi_fasilitas);
    }
}
