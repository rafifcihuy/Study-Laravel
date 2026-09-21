<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Category::create([
            'name' => 'UI UX Design',
            'slug' => 'ui-ux-design',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Category::create([
            'name' => 'Data Science',
            'slug' => 'data-science',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
