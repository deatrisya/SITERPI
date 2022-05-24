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
                'nama_obat' => 'Colibact'
            ],
            [
                'nama_obat' => 'Cofnil'
            ],
            [
                'nama_obat' => 'Datilan'
            ],
            [
                'nama_obat' => 'Wormectin'
            ]
        ];
        DB::table('obats')->insert($dataItem);
    }
}
