<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);
        Blog::factory(100)->create([
            'author_id' => fn () => User::query()->inRandomOrder()->value('id'),
            'category_id' => fn () => Category::query()->inRandomOrder()->value('id'),
        ]);
    }
}
