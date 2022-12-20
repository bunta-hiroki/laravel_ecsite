<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'アクセサリー',
                'sort_order' => '1',
            ],
            [
                'name' => 'バッグ',
                'sort_order' => '2',
            ],
            [
                'name' => 'トップス',
                'sort_order' => '3',
            ],

        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'イヤリング',
                'sort_order' => '1',
                'primary_category_id' => '1',
            ],
            [
                'name' => 'ピアス',
                'sort_order' => '2',
                'primary_category_id' => '1',
            ],
            [
                'name' => 'ネックレス',
                'sort_order' => '3',
                'primary_category_id' => '1',
            ],
            [
                'name' => 'ショルダーバッグ',
                'sort_order' => '4',
                'primary_category_id' => '2',
            ],
            [
                'name' => 'バックパック',
                'sort_order' => '5',
                'primary_category_id' => '2',
            ],
            
        ]);
    }
}
