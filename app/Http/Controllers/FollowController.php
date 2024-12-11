<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
    // Follow a user
    public function follow($id, Request $request)
    {
        $user = $request->user();

        // Cek jika pengguna sudah mengikuti
        if ($user->id === $id) {
            return response()->json(['message' => 'Cannot follow yourself.'], 400);
        }

        $existingFollow = Follow::where('follower_id', $user->id)->where('following_id', $id)->first();
        if ($existingFollow) {
            return response()->json(['message' => 'Already following this user.'], 400);
        }

        Follow::create([
            'follower_id' => $user->id,
            'following_id' => $id,
        ]);

        return response()->json(['message' => 'Followed successfully.']);
    }

    // Unfollow a user
    public function unfollow($id, Request $request)
    {
        $user = $request->user();

        $follow = Follow::where('follower_id', $user->id)->where('following_id', $id)->first();
        if (!$follow) {
            return response()->json(['message' => 'You are not following this user.'], 400);
        }

        $follow->delete();
        return response()->json(['message' => 'Unfollowed successfully.']);
    }

    // Get followers of a user
    public function getFollowers($id)
    {
        $followers = Follow::where('following_id', $id)->get();
        return response()->json($followers);
    }

    // Get following of a user
    public function getFollowing($id)
    {
        $following = Follow::where('follower_id', $id)->get();
        return response()->json($following);
    }
}
