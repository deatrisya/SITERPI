<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
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
                'nama_obat' => 'Colibact',
                'satuan' => 'pcs',
                'harga' => 1500
            ],
            [
                'nama_obat' => 'Cofnil',
                'satuan' => 'pcs',
                'harga' => 2000,
            ],
            [
                'nama_obat' => 'Datilan',
                'satuan' => 'ml',
                'harga' => 100,
            ],
            [
                'nama_obat' => 'Wormectin',
                'satuan' => 'ml',
                'harga' => 100
            ]
        ];
        DB::table('obats')->insert($dataItem);
    }
}
