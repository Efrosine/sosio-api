<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Get current logged-in user
    public function getCurrentUser(Request $request)
    {
        $user = $request->user()->load('following', 'followers'); // Mengambil pengguna yang terautentikasi
        $user->following_count = $user->following()->count();
        $user->followers_count = $user->followers()->count();
        $user->posts_count = $user->posts()->count();
        return response()->json($user);
    }

    // Search for users by username
    public function searchUser(Request $request)
    {
        $query = $request->get('username');
        $users = User::where('username', 'like', "%$query%")->get();
        return response()->json($users);
    }

    // Get profile of a user by ID
    public function getUserProfile($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
}
