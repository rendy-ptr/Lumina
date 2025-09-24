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
        // Create 5 users with visitor roles
        User::factory()->count(5)->create();
        // Create 5 users with author roles
        User::factory()->count(5)->author()->create();
    }
}
