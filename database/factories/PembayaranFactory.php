<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_petugas' => \App\Models\Petugas::inRandomOrder()->first()->id ?? 1,
            'nisn' => \App\Models\Siswa::inRandomOrder()->first()->nisn ?? '1234567890',
            'tgl_bayar' => $this->faker->date(),
            'bulan_dibayar' => $this->faker->monthName(),
            'tahun_dibayar' => $this->faker->year(),
            'id_spp' => \App\Models\Spp::inRandomOrder()->first()->id ?? 1,
            'jumlah_bayar' => $this->faker->numberBetween(50000, 200000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
