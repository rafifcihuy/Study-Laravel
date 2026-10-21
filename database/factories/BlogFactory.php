<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            "title" => $title = fake()->sentence(mt_rand(2, 5)),
            "author_id" => User::factory(),
            "category_id" => Category::factory(),
            "slug"  => str()->slug($title),
            "body" => fake()->text(),
        ];
    }
}
