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
            ]
        ];
        DB::table('users')->insert($dataItem);
    }
}
