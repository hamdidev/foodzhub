<?php

namespace Database\Factories;

use App\Models\Category;
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
        return [
            "name" => fake()->word(),
            "slug" => fake()->slug(),
            "thumbnail_img" => '/uploads/test.png',
            "category_id" => function () {
                return Category::inRandomOrder()->first()->id;
            },
            "short_desc" => fake()->paragraph(),
            "long_desc" => fake()->paragraph(),
            "price" => fake()->randomFloat(2, 10, 200),
            "offer_price" => fake()->randomFloat(2, 1, 100),
            "sku" => fake()->unique()->ean13(),
            "seo_title" => fake()->sentence(),
            "seo_desc" => fake()->paragraph(),
            "status" => fake()->boolean(),
            "show_at_home" => fake()->boolean(),




        ];
    }
}
