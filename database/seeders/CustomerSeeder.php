<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;



class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Customer::factory()->count(10)->create();
        $customer = [
            [
                'id' => 1,
                'id_jenis_customer' => 1,
                'no_identitas' => rand(1000000000000000, 9999999999999999),
                'jenis_identitas' => 'KTP',
                'nama_institusi' => NULL,
                'nama' => 'Tukiman',
                'email' => 'tukiman@gmail.com',
                'password' => Hash::make('tukimanpass'),
                'no_telp' => '088077669009',
                'alamat' => 'Jl. Kaliurang KM. 5'
            ],
            [
                'id' => 2,
                'id_jenis_customer' => 2,
                'no_identitas' => rand(1000000000000000, 9999999999999999),
                'jenis_identitas' => 'KTP',
                'nama_institusi' => 'PT. Jaya Perkasa',
                'nama' => 'Jali',
                'email' => 'jali@gmail.com',
                'password' => NULL,
                'no_telp' => '089877542343',
                'alamat' => 'Jl. Malioboro No. 66 E'
            ],
            [
                'id' => 3,
                'id_jenis_customer' => 2,
                'no_identitas' => rand(1000000000000000, 9999999999999999),
                'jenis_identitas' => 'KTP',
                'nama_institusi' => 'PT. Morinaga Kino',
                'nama' => 'Marina',
                'email' => 'marina@gmail.com',
                'password' => NULL,
                'no_telp' => '081234567890',
                'alamat' => 'Jl. Maguwoharjo No. 42'
            ],
            [
                'id' => 4,
                'id_jenis_customer' => 1,
                'no_identitas' => rand(1000000000000000, 9999999999999999),
                'jenis_identitas' => 'KTP',
                'nama_institusi' => NULL,
                'nama' => 'Ferdi',
                'email' => 'ferdi@gmail.com',
                'password' => Hash::make('ferdipass'),
                'no_telp' => '081234567890',
                'alamat' => 'Jl. Ring Road Utara No. 3'
            ],
            [
                'id' => 5,
                'id_jenis_customer' => 1,
                'no_identitas' => rand(1000000000000000, 9999999999999999),
                'jenis_identitas' => 'KTP',
                'nama_institusi' => NULL,
                'nama' => 'Yustin',
                'email' => 'yustin@gmail.com',
                'password' => Hash::make('yustinpass'),
                'no_telp' => '084255554323',
                'alamat' => 'Jl. Seturan No. 153'
            ]
        ];

        DB::table('customer')->insert($customer);
    }
}
