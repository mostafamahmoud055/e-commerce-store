<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->productName;
        return [
            'name' => $name, //true to return string
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(15),
            'image' => $this->faker->imageUrl(300, 300),
            'price' => $this->faker->randomFloat(1, 1, 499), // fraction, min, max (9.3)
            'compare_price' => $this->faker->randomFloat(1, 500, 999),
            'category_id' => Category::inRandomOrder()->first()->id,
            'store_id' => Store::inRandomOrder()->first()->id,
            'featured' => rand(0, 1),
            'quantity' => rand(5, 15)
        ];
    }
}
