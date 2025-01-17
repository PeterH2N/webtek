<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // run in for loop to run query before each iteration
        Post::factory()->create();
        for ($i = 0; $i < 4999; $i++) {
            Post::factory()->comment()->create();
        }
    }
}
