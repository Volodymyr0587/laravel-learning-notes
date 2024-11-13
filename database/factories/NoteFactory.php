<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ResourceType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            // 'image' => $this->faker->imageUrl(),
            'image' => null,
            'link_to_tutorial' => $this->faker->url(),
            'link_to_resource' => $this->faker->url(),
            'resource_name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'project_folder' => $this->faker->word,
            'database_name' => $this->faker->word,
            'link_to_github_repo' => $this->faker->url(),
            'link_to_source_code' => $this->faker->url(),
            'link_to_source_materials' => $this->faker->url(),
            'completed' => $this->faker->boolean,
        ];
    }
}
