<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'Karina',
                'email' => 'karina@gmail.com',
                'password' => Hash::make('karina'),
                'bio' => 'Just a regular user.',
                'profile_picture' => 'https://www.kpopmonster.jp/wp-content/uploads/2021/07/karina_01.jpg',
            ],
            [
                'username' => 'jane_doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'bio' => 'Flutter enthusiast and blogger.',
                'profile_picture' => 'https://www.kpopmonster.jp/wp-content/uploads/2021/07/karina_01.jpg',
            ],
            [
                'username' => 'admin_user',
                'email' => 'admin@example.com',
                'password' => Hash::make('adminpassword'),
                'bio' => 'System administrator.',
                'profile_picture' => 'https://www.kpopmonster.jp/wp-content/uploads/2021/07/karina_01.jpg',
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
