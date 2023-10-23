<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pegawai::factory()->count(10)->create();
        $pegawai = [
            [
                'id_role' => 1,
                'nama' => 'Owner',
                'email' => 'owner@gah.com',
                'password' => Hash::make('ownerpass'),
                'no_telp' => '089990098776',
                'alamat' => 'Jl. Kledokan No. 105 C',
            ],
            [
                'id_role' => 2,
                'nama' => 'Admin',
                'email' => 'admin@gah.com',
                'password' => Hash::make('adminpass'),
                'no_telp' => '089990098776',
                'alamat' => 'Jl. Kledokan No. 105 C',
            ],
            [
                'id_role' => 3,
                'nama' => 'Eddo',
                'email' => 'eddo@gah.com',
                'password' => Hash::make('eddopass'),
                'no_telp' => '081234432112',
                'alamat' => 'Jl. Babarsari No. 43',
            ],
            [
                'id_role' => 4,
                'nama' => 'Sansa',
                'email' => 'sansa@gah.com',
                'password' => Hash::make('sansapass'),
                'no_telp' => '085657600987',
                'alamat' => 'Gg. Permai Indah, No.1A, Jl. Seturan'
            ],
            [
                'id_role' => 5,
                'nama' => 'Memet',
                'email' => 'memet@gah.com',
                'password' => Hash::make('memetpass'),
                'no_telp' => '085657600987',
                'alamat' => 'Gg. Rukun No. 3, Jl. Babarsari',
            ],
        ];

        DB::table('pegawai')->insert($pegawai);
    }
}
