<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->count(1)->create();

        \App\Models\Post::factory()->count(5)->create([
            'user_id' => \App\Models\User::first()->id ?? 1
        ]);
    }
}
