<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        User::create([
            'name' => 'Rafif Cihuy',
            'username' => 'rafifcihuy',
            'email_verified_at' => now(),
            'email' => 'rafif@example.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::factory()->count(10)->create();
    }
}
