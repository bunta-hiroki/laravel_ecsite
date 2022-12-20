<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Practice;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Practice::factory()->count(10)->create();
    }
}
