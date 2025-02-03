<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petugas>
 */
class PetugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'password' => Hash::make('password123'),
            'nama_petugas' => fake()->name(),
            'level' => fake()->randomElement(['admin', 'petugas']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
