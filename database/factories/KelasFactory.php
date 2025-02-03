<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kelas' => fake()->randomElement(['X IPA 1', 'X IPA 2', 'XI IPS 1', 'XII RPL']),
            'keahlian' => fake()->randomElement(['IPA', 'IPS', 'RPL', 'TKJ']),
        ];
    }
}
