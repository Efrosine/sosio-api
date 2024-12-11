<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'user_id' => 1,
                'content' => 'This is my first post!',
                'image' => null,
            ],
            [
                'user_id' => 2,
                'content' => 'Loving the Laravel framework!',
                'image' => null,
            ],
            [
                'user_id' => 3,
                'content' => 'Hello, world!',
                'image' => 'image3.png',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
