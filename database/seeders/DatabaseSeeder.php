<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create(['name' => 'General']);
        Category::create(['name' => 'PHP']);
        Category::create(['name' => 'Laravel']);
        Category::create(['name' => 'Livewire']);
        Category::create(['name' => 'SQL']);
        Category::create(['name' => 'Python']);
    }
}
