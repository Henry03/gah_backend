<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call([
        //     JenisCustomerSeeder::class,
        //     // CustomerSeeder::class,
        //     RoleSeeder::class,
        //     // PegawaiSeeder::class,
        //     SeasonSeeder::class,
        //     JenisKamarSeeder::class,
        //     TarifSeeder::class,
        //     StatusKamarSeeder::class,
        //     KamarSeeder::class,
        //     FasilitasSeeder::class,
        //     StatusPromoSeeder::class,
        //     // PromoSeeder::class,
        //     // UangJaminanSeeder::class,
        //     // DepositSeeder::class,
        //     // ReservasiSeeder::class,
        //     // ReservasiKamarSeeder::class,
        //     // ReservasiFasilitasSeeder::class,
        //     // TransaksiSeeder::class,
        //     // JumlahKamarSeeder::class,
        // ]);
        $this->call([
            JenisCustomerSeeder::class,
            CustomerSeeder::class,
            RoleSeeder::class,
            PegawaiSeeder::class,
            SeasonSeeder::class,
            JenisKamarSeeder::class,
            TarifSeeder::class,
            StatusKamarSeeder::class,
            KamarSeeder::class,
            FasilitasSeeder::class,
            StatusPromoSeeder::class,
            PromoSeeder::class,
            UangJaminanSeeder::class,
            DepositSeeder::class,
            ReservasiSeeder::class,
            ReservasiKamarSeeder::class,
            ReservasiFasilitasSeeder::class,
            TransaksiSeeder::class,
            JumlahKamarSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
    }

}
