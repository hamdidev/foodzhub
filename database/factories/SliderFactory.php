<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "image" => "/uploads/test",
            "offer" => '40%',
            "title" => fake()->sentence(),
            "subtitle" => fake()->sentence(10),
            "short_desc" => fake()->paragraph(2),
            "button_link" => fake()->url(),
            "status" => fake()->boolean(),
        ];
    }
}
