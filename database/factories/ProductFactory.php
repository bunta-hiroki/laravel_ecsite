<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;


class ProductFactory extends Factory
{
    // protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'information' => $this->faker->realText,
            'price' => $this->faker->numberBetween(10,10000),
            'is_selling' => $this->faker->numberBetween(0,1),
            'sort_order' => $this->faker->randomNumber,
            'shop_id' => $this->faker->numberBetween(1,2),
            'secondary_category_id' => $this->faker->numberBetween(1,5),
            'image1' => $this->faker->numberBetween(1,6),
            'image2' => $this->faker->numberBetween(1,6),
            'image3' => $this->faker->numberBetween(1,6),
            'image4' => $this->faker->numberBetween(1,6),
        ];
    }
}
