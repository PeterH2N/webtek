<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make friends
        // for each user, run through each consequent user
        // 1/10 chance that that user becomes a friend

        for ($i = 1; $i <= User::count(); $i++) {
            $user1 = User::findOrFail($i);
            // loop through all consequent users
            for ($j = $i + 1; $j <= User::count(); $j++) {
                $user2 = User::findOrFail($j);
                // 1/10 chance
                if (rand(1, 10) == 1) {
                    DB::table('friends')->insert([
                        'user1_id' => $user1->id,
                        'user2_id' => $user2->id,
                    ]);
                }
            }
        }
    }
}
