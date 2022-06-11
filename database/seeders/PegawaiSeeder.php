<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
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
                'nip' => 'P12345',
                'foto_pegawai' => null,
                'nama' => 'Siti Aisyah',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '2002-01-14',
                'alamat' => 'Sukorejo, Kabupaten Pasuruan',
                'no_telp' => '083857129219',
                'jabatan' => 'Manager',
                'jam_kerja' => 48,
                'gaji' => 4500000,

            ]
        ];
        DB::table('pegawais')->insert($dataItem);
    }
}
