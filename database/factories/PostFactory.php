<?php

namespace Database\Factories;

use App\Models\Post;
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
            'title' => $this->faker->realTextBetween(10, 40),
            'content' => $this->faker->realTextBetween(100, 200),
            'user_id' => $this->faker->numberBetween(User::first()->id, User::count()),
            'parent_id' => null,
        ];
    }

    public function comment(): Factory {
        return $this->state([
            'parent_id' => $this->faker->randomElement([null, $this->faker->numberBetween(Post::first()->id, Post::count())]),
        ]);
    }
}
