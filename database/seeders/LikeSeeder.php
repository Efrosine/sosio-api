<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;

class LikeSeeder extends Seeder
{
    public function run()
    {
        $likes = [
            ['post_id' => 1, 'user_id' => 2],
            ['post_id' => 1, 'user_id' => 3],
            ['post_id' => 2, 'user_id' => 1],
        ];

        foreach ($likes as $like) {
            Like::create($like);
        }
    }
}
