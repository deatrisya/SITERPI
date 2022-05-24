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
                'jumlah_unit' => 10,
                'harga_satuan' => 7500,
                'total_harga' => 75000
            ],
            [
                'obat_id' => 3,
                'isi' => 60,
                'status' => 'Masuk',
                'jumlah_unit' => 5,
                'harga_satuan' => 18500,
                'total_harga' => 92500
            ]
        ];
        DB::table('riwayat_obats')->insert($dataItem);
    }
}
