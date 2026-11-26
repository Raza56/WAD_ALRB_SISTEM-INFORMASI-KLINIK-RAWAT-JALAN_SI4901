<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

<<<<<<< HEAD
    public function run(): void
    {
        User::factory(10)->create();
=======
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
>>>>>>> origin/andhika

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
<<<<<<< HEAD
            'password' => 'bojong123'
=======
>>>>>>> origin/andhika
        ]);
    }
}
