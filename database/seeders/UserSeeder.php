<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'first_name' => 'Pista',
            'last_name' => 'Kiss',
            'username' => 'kisspista',
            'phone_number' => '06203456789',
            'email' => 'kisspista@gmail.com',
            'password' => Hash::make('password'),
            'birth_date' => '1985-02-23',
        ]);

        DB::table('users')->insert([
            'first_name' => 'Mónika',
            'last_name' => 'Galád',
            'username' => 'galadmoni',
            'phone_number' => '06302348956',
            'email' => 'galadmoni@gmail.com',
            'password' => Hash::make('password'),
            'birth_date' => '1998-11-28',
        ]);
    }
}
