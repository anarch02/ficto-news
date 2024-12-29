<?php

namespace Database\Factories;

use App\Models\User;
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
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'title' => [
                'en' => $this->faker->sentence,
                'es' => $this->faker->sentence,
            ],
            'image' => $this->faker->imageUrl(),
            'seo_description' => [
                'en' => $this->faker->sentence,
                'es' => $this->faker->sentence,
            ],
            'seo_keywords' => $this->faker->words(5),
            'content' => [
                'en' => $this->faker->paragraph,
                'es' => $this->faker->paragraph,
            ],
            'is_published' => $this->faker->boolean,
            'tags' => $this->faker->words(5),
        ];
    }
}
