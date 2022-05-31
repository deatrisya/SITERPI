<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiwayatObatSeeder extends Seeder
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
                'obat_id' => 1,
                'isi' => 100,
                'status' => 'Masuk',
                'harga_satuan' => 1500,
                'total_harga' => 150000
            ],
            [
                'obat_id' => 3,
                'isi' => 60,
                'status' => 'Masuk',
                'harga_satuan' => 100,
                'total_harga' => 6000
            ]
        ];
        DB::table('riwayat_obats')->insert($dataItem);
    }
}
