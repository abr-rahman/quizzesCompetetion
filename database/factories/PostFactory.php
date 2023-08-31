<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_ids = \App\Models\User::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($user_ids),
            'title' => $this->faker->word(2),
            'category' => $this->faker->word(3),
            'description' => $this->faker->paragraph(3),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean(90),
        ];
    }
}
