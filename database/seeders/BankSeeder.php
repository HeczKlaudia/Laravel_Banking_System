<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\is_integer;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'nev' => 'OTP Bank',
        ]);

        DB::table('banks')->insert([
            'nev' => 'Revolut',
        ]);

        DB::table('banks')->insert([
            'nev' => 'CIB Bank',
        ]);
    }
}
