<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Pembayaran;
use App\Models\Kelas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Kelas::factory()->count(1)->create();
        Petugas::factory()->count(1)->create();
        Spp::factory()->count(1)->create();
        Siswa::factory()->count(1)->create();
        //Pembayaran::factory()->count(10)->create(); //! Err teuing kunaon cape ah
    }
}
