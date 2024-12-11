<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Get current logged-in user
    public function getCurrentUser(Request $request)
    {
        $user = $request->user(); // Mengambil pengguna yang terautentikasi
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
