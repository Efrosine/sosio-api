<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            FollowSeeder::class,
            PostSeeder::class,
            LikeSeeder::class,
            CommentSeeder::class,
        ]);
    }
}