<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Follow;

class FollowSeeder extends Seeder
{
    public function run()
    {
        $follows = [
            ['follower_id' => 1, 'following_id' => 2],
            ['follower_id' => 2, 'following_id' => 1],
            ['follower_id' => 3, 'following_id' => 1],
        ];

        foreach ($follows as $follow) {
            Follow::create($follow);
        }
    }
}
