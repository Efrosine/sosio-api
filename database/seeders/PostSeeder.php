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
                'image' => 'https://www.kpopmonster.jp/wp-content/uploads/2021/07/karina_01.jpg',
            ],
            [
                'user_id' => 2,
                'content' => 'Loving the Laravel framework!',
                'image' => 'https://www.kpopmonster.jp/wp-content/uploads/2021/07/karina_01.jpg',
            ],
            [
                'user_id' => 3,
                'content' => 'Hello, world!',
                'image' => 'https://www.kpopmonster.jp/wp-content/uploads/2021/07/karina_01.jpg',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
