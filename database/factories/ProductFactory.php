<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(3),
            'state' => $this->faker->randomElement(['sale','standard']),
            'visibility' => $this->faker->boolean(),
            'price' => $this->faker->randomFloat(2, 10,2000),
            'reference' => Str::random(16),
        ];
    }
}
