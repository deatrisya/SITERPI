<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * reference : https://sumbarprov.go.id/home/news/12361-jenis-pakan-ternak-dan-kandungan-nutrisinya.html
     *
     * @return void
     */
    public function run()
    {
        $dataItem = [
            [
                'jenis_pakan' => 'Pakan Kasar',
                'harga' => 10000,
            ],
            [
                'jenis_pakan' => 'Pakan Penguat',
                'harga' => 20000,
            ],
            [
                'jenis_pakan' => 'Pakan Fermentasi',
                'harga' => 30000,
            ],
            [
                'jenis_pakan' => 'Pakan Tambahan',
                'harga' => 40000,
            ]
        ];
        DB::table('pakans')->insert($dataItem);
    }
}
