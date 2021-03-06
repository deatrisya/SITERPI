<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            JenisSapiSeeder::class,
            SapiSeeder::class,
            TransaksiSeeder::class,
            ObatSeeder::class,
            RiwayatObatSeeder::class,
            PakanSeeder::class,
            RiwayatPakanSeeder::class,
            KeuanganSeeder::class,
            PegawaiSeeder::class,
        ]);
    }
}
