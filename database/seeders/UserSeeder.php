<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 10 user, masing-masing akan mendapatkan profile otomatis
        User::factory(10)->create();
        // Buat user dengan role author
        User::factory()->author()->create();
        User::factory(5)->author()->create();
    }
}
