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
        DB::table('users')->insert([
            'nama' => 'Deatrisya',
            'username' => 'admin',
            'password'=> Hash::make('admin'),
            'email' => 'admin@email.com',
            'jenis_kelamin' => 'P',
            'tanggal_lahir' => '2001-12-18',
            'alamat' => 'Purwosari',
            'jabatan' => 'Admin'
        ]);
    }
}
