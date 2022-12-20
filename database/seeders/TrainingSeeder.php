<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;


class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Training::factory()->count(10)->create();
    }
}
