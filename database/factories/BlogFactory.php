<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "author_id" => User::factory(),
            "slug" => str()->slug(fake()->sentence()),
            "body" => fake()->text(),
        ];
    }
}
