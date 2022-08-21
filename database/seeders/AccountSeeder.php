<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'nev' => 'számla1',
            'szamlaszam' => '117-53252-2352-5235-00000000',
            'egyenleg' => '15.000',
            'hitelkeret' => '0',
            'tipus' => 'Junior számla',
            'iban' => 'HU48 117-53252-2352-5235-00000000',
            'user_id' => '1',
            'bank_id' => '1',
        ]);

        DB::table('accounts')->insert([
            'nev' => 'számla2',
            'szamlaszam' => '119-44445-7886-5543-00000000',
            'egyenleg' => '400.000',
            'hitelkeret' => '20.000',
            'tipus' => 'Lakossági folyószámla',
            'iban' => 'HU92 119-44445-7886-5543-00000000',
            'user_id' => '1',
            'bank_id' => '2',
        ]);

        DB::table('accounts')->insert([
            'nev' => 'számla3',
            'szamlaszam' => '345-45562-2310-3201-00000000',
            'egyenleg' => '15.000',
            'hitelkeret' => '10',
            'tipus' => 'Lakossági folyószámla',
            'iban' => 'HU23 345-45562-2310-3201-00000000',
            'user_id' => '2',
            'bank_id' => '3',
        ]);
    }
}
