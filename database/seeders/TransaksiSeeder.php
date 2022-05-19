<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
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
                'sapi_id' => 1,
                'status_transaksi' => 'Beli',
                'harga' => '500000'
            ],
            [
                'sapi_id' => 2,
                'status_transaksi' => 'Beli',
                'harga' => '500000'
            ]
        ];
        DB::table('transaksis')->insert($dataItem);
    }
}
