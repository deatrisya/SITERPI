<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeuanganSeeder extends Seeder
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
                'tanggal' => '2022-02-21',
                'tipe' => 'Obat',
                'tipeID' => 'O1',
                'Masuk' => '200000',
                'Keluar' => '0',
            ],
            [
                'tanggal' => '2022-02-21',
                'tipe' => 'Transaksi',
                'tipeID' => 'T1',
                'Masuk' => '0',
                'Keluar' => '100000',
            ]
        ];
        DB::table('keuangans')->insert($dataItem);
    }
}
