<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Stock;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            BlogsTableSeeder::class,
            OwnerSeeder::class,
            ShopSeeder::class,
            ImageSeeder::class,
            CategorySeeder::class,
            PracticeSeeder::class,
            UserSeeder::class,
        ]);
        
        Product::factory(100)->create();
        Stock::factory(100)->create();
    }
}

// AdminSeeder::class,
// PostSeeder::class,