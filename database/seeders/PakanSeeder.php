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
                'jenis_pakan' => 'Pakan Kasar'
            ],
            [
                'jenis_pakan' => 'Pakan Penguat'
            ],
            [
                'jenis_pakan' => 'Pakan Fermentasi'
            ],
            [
                'jenis_pakan' => 'Pakan Tambahan'
            ]
        ];
        DB::table('pakans')->insert($dataItem);
    }
}
