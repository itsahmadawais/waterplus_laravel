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
        $sector = DB::table('sectors')->insert([
            'sector_title' => 'Sector 17'
        ]);

        DB::table('users')->insert([
            'f_name' => 'Admin',
            'l_name' => 'Admin',
            'email' => 'admin@waterplus.com',
            'password' => Hash::make('password'),
            'phone' => '03346977744',
            'role' => 'admin',
            'address' => 'NA',
            'price' => 0,
            'sector_id' => '1'
        ]);
    }
}
