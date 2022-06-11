<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'foto' => null,
                'nama' => 'Deatrisya',
                'username' => 'admin',
                'password'=> Hash::make('admin'),
                'email' => 'admin@email.com',
                'no_hp' => '081222333444',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2001-12-18',
                'alamat' => 'Purwosari',
                'jabatan' => 'Admin'
            ],
            [
                'foto' => null,
                'nama' => 'Dea Mirell',
                'username' => 'deamirell',
                'password'=> Hash::make('12345678'),
                'email' => 'deatrisya@email.com',
                'no_hp' => '081222333444',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2001-12-18',
                'alamat' => 'Purwosari',
                'jabatan' => 'Admin'
            ],
            [
                'foto' => null,
                'nama' => 'Siti Aisyah',
                'username' => 'aisyah',
                'password'=> Hash::make('aisyah'),
                'email' => 'sitiaisyah4110@gmail.com',
                'no_hp' => '083857129219',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2002-01-14',
                'alamat' => 'Sukorejo',
                'jabatan' => 'Admin'
            ]
        ];
        DB::table('users')->insert($dataItem);
    }
}
