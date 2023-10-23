<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            [
                'id' => 1,
                'nama_role' => 'Owner',
            ],[
                'id' => 2,
                'nama_role' => 'Admin',
            ],[
                'id' => 3,
                'nama_role' => 'General Manager',
            ],[
                'id' => 4,
                'nama_role' => 'Sales and Marketing',
            ],[
                'id' => 5,
                'nama_role' => 'Front Officer',
            ]
        ];

        DB::table('role')->insert($role);
    }
}
