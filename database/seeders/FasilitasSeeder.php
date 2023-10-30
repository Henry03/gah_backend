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
            [
                'id' => 6,
                'nama_fasilitas' => 'Airport Pick Up',
                'harga' => '100000'
            ],
            [
                'id' => 7,
                'nama_fasilitas' => 'Airport Drop Off',
                'harga' => '100000'
            ],
            [
                'id' => 8,
                'nama_fasilitas' => 'Extra Pillow',
                'harga' => '10000'
            ],
            [
                'id' => 9,
                'nama_fasilitas' => 'Extra Blanket',
                'harga' => '10000'
            ],
            [
                'id' => 10,
                'nama_fasilitas' => 'Extra Towel',
                'harga' => '10000'
            ],
            [
                'id' => 11,
                'nama_fasilitas' => 'Extra Soap',
                'harga' => '10000'
            ],
            [
                'id' => 12,
                'nama_fasilitas' => 'Extra Shampoo',
                'harga' => '10000'
            ],
            [
                'id' => 13,
                'nama_fasilitas' => 'Extra Toothbrush',
                'harga' => '10000'
            ],
            [
                'id' => 14,
                'nama_fasilitas' => 'Extra Toothpaste',
                'harga' => '10000'
            ],
            [
                'id' => 15,
                'nama_fasilitas' => 'Extra Sandal',
                'harga' => '10000'
            ],
            [
                'id' => 16,
                'nama_fasilitas' => 'Extra Tissue',
                'harga' => '10000'
            ],
            [
                'id' => 17,
                'nama_fasilitas' => 'Extra Mineral Water',
                'harga' => '10000'
            ],
            [
                'id' => 18,
                'nama_fasilitas' => 'Extra Coffee',
                'harga' => '10000'
            ],
            [
                'id' => 19,
                'nama_fasilitas' => 'Extra Tea',
                'harga' => '10000'
            ],
            
        ];

        DB::table('fasilitas')->insert($fasilitas);
    }
}
