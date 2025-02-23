<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spp>
 */
class SppFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tahun' => fake()->numberBetween(2015, 2030),
            'semester' => fake()->randomElement(['genap', 'ganjil']),
            'nominal' => fake()->numberBetween(100000, 500000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
