<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => fake()->unique()->numerify('80########'),
            'nis' => fake()->unique()->numerify('69######'),
            'nama' => fake()->name(),
            'id_kelas' => \App\Models\Kelas::inRandomOrder()->first()->id ?? 1,
            'alamat' => fake()->address(),
            'no_telp' => fake()->numerify('08###########'),
            'id_spp' => \App\Models\Spp::inRandomOrder()->first()->id ?? 1,
            'password' => bcrypt('12345678'),
        ];
    }
}
