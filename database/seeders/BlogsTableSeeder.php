<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;    // 追記

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory()->count(10)->create();    // 追記
    }
}
