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
                'username' => 'john_doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'bio' => 'Just a regular user.',
                'profile_picture' => null,
            ],
            [
                'username' => 'jane_doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'bio' => 'Flutter enthusiast and blogger.',
                'profile_picture' => null,
            ],
            [
                'username' => 'admin_user',
                'email' => 'admin@example.com',
                'password' => Hash::make('adminpassword'),
                'bio' => 'System administrator.',
                'profile_picture' => null,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
