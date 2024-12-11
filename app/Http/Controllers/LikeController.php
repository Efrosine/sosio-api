<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    // Like a post
    public function likePost($id, Request $request)
    {
        $user = $request->user();

        // Cek jika sudah like post
        $existingLike = Like::where('post_id', $id)->where('user_id', $user->id)->first();
        if ($existingLike) {
            return response()->json(['message' => 'You already liked this post.'], 400);
        }

        Like::create([
            'post_id' => $id,
            'user_id' => $user->id,
        ]);

        return response()->json(['message' => 'Post liked successfully.']);
    }

    // Unlike a post
    public function unlikePost($id, Request $request)
    {
        $user = $request->user();

        $like = Like::where('post_id', $id)->where('user_id', $user->id)->first();
        if (!$like) {
            return response()->json(['message' => 'You did not like this post.'], 400);
        }

        $like->delete();
        return response()->json(['message' => 'Post unliked successfully.']);
    }
}
