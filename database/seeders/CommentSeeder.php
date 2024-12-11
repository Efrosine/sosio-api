<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $comments = [
            [
                'post_id' => 1,
                'user_id' => 2,
                'comment' => 'Great post, John!',
            ],
            [
                'post_id' => 2,
                'user_id' => 1,
                'comment' => 'Totally agree, Jane!',
            ],
            [
                'post_id' => 3,
                'user_id' => 2,
                'comment' => 'Welcome to the platform!',
            ],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
