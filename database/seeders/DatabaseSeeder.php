<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ResourceType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a specific user with known credentials
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => 'password123',
            'remember_token' => Str::random(10),
        ]);

        // Define unique names for categories and resource types
        $categoryNames = ['php', 'laravel', 'tailwindcss', 'css', 'html', 'livewire', 'filament', 'docker'];
        $resourceTypeNames = ['YouTube Video', 'YouTube Playlist', 'Text Based Tutorial', 'Article'];

        // Seed categories without duplicates
        foreach ($categoryNames as $name) {
            Category::firstOrCreate(['name' => $name, 'user_id' => $user->id]);
        }

        // Seed resource types without duplicates
        foreach ($resourceTypeNames as $name) {
            ResourceType::firstOrCreate(['name' => $name, 'user_id' => $user->id]);
        }

        // Create notes for this user
        $resourceTypes = ResourceType::where('user_id', $user->id)->get();

        // Create Notes for this user and randomly assign a ResourceType
        $notes = Note::factory(10)->make(['user_id' => $user->id]);

        $notes->each(function ($note) use ($resourceTypes) {
            $note->resource_type_id = $resourceTypes->random()->id; // Randomly assign a resource type
            $note->save(); // Save the note with the assigned resource type
        });

        // Attach categories to notes
        $categories = Category::where('user_id', $user->id)->get();
        $notes->each(function ($note) use ($categories) {
            $note->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
