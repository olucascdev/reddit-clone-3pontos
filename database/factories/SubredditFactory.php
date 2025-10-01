<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Subreddit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subreddit>
 */
final class SubredditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(3, true),
            'description' => fake()->sentence(),
            'photo' => fake()->imageUrl(640, 480, 'cats', true),
            'banner' => fake()->imageUrl(1024, 200, 'cats', true),
        ];
    }
}
