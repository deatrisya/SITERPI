<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SapiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataItem = [
            [
                'jenissapi_id' => 1,
                'nis' => 'S0001',
                'tanggal_lahir' => '2021-01-01',
                'status' => 'Terjual',
                'jenis_kelamin' => 'Jantan',
                'status_asal' => 'Ternak',
                'bobot' => 7,
                'harga' => 500000,
                'kondisi' => 'Sehat',
                'keterangan' => null
            ],
            [
                'jenissapi_id' => 2,
                'nis' => 'S0002',
                'tanggal_lahir' => '2021-02-02',
                'status' => 'Belum Terjual',
                'jenis_kelamin' => 'Jantan',
                'status_asal' => 'Beli',
                'bobot' => 7,
                'harga' => 500000,
                'kondisi' => 'Sehat',
                'keterangan' => null
            ]
        ];
        DB::table('sapis')->insert($dataItem);
    }
}
