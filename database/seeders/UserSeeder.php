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
            'name' => 'testggg',
            'email' => 'testhhhh@test.com',
            'password' => Hash::make('password123hhhh'),
            'created_at' => '2022/02/01'
        ]);
    }
}
