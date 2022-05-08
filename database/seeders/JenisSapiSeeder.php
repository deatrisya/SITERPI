<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSapiSeeder extends Seeder
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
                'jenis_sapi' => 'Limousin'
            ]
        ];
        DB::table('jenis_sapis')->insert($dataItem);
    }
}
