<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->word,
                'es' => $this->faker->word,
            ],
            'seo_description' => [
                'en' => $this->faker->sentence,
                'es' => $this->faker->sentence,
            ],
            'seo_keywords' => $this->faker->words,
        ];
    }
}
