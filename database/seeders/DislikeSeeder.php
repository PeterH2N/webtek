<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DislikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for each user, loop through all posts made by their friends, dislike 1/10 of them
        $users = User::all();
        foreach ($users as $user) {
            $friends = $user->friends();
            $posts = Post::whereIn('user_id', $friends->pluck('id'))->get();
            foreach ($posts as $post) {
                if (rand(1, 10) == 1 && !$post->userLikes($user)) {
                    DB::table('dislikes')->insert([
                        'post_id' => $post->id,
                        'user_id' => $user->id,
                    ]);
                }
            }
        }
    }
}
