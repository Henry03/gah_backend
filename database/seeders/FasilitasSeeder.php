<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fasilitas = [
            [
                'id' => 1,
                'nama_fasilitas' => 'Laundry',
                'harga' => '10000'
            ],
            [
                'id' => 2,
                'nama_fasilitas' => 'Extra Bed',
                'harga' => '50000'
            ],
            [
                'id' => 3,
                'nama_fasilitas' => 'Tambahan Breakfast',
                'harga' => '50000'
            ],
            [
                'id' => 4,
                'nama_fasilitas' => 'Lunch',
                'harga' => '50000'
            ],
            [
                'id' => 5,
                'nama_fasilitas' => 'Dinner',
                'harga' => '50000'
            ],
            
        ];

        DB::table('fasilitas')->insert($fasilitas);
    }
}
