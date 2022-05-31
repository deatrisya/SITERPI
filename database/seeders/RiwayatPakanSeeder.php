<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiwayatPakanSeeder extends Seeder
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
                'pakan_id' => 1,
                'tanggal' => '2022-5-24',
                'status' => 'Masuk',
                'waktu' => null,
                'jumlah' => 10,
                'harga_satuan' => 10000,
                'total_harga' => 100000
            ],
            [
                'pakan_id' => 2,
                'tanggal' => '2022-5-24',
                'status' => 'Masuk',
                'waktu' => null,
                'jumlah' => 10,
                'harga_satuan' => 20000,
                'total_harga' => 200000
            ]
        ];
        DB::table('riwayat_pakans')->insert($dataItem);
    }
}
