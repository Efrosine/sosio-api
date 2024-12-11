<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Create a new post
    public function createPost(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
            'image' => 'nullable',
        ]);

        $post = Post::create([
            'user_id' => $request->user()->id,
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return response()->json($post, 201);
    }

    // Get all posts
    public function getAllPosts()
    {
        $posts = Post::with('user', 'comments.user', 'likes')->get()->map(function ($post) {
            $post->comment_count = $post->comments()->count(); // Count the comments
            $post->like_count = $post->likes()->count(); // Count the likes

            // Modify each comment to include the username of the user who commented
            $post->comments->each(function ($comment) {
                $comment->username = $comment->user->username;
            });

            return $post;
        });

        return response()->json($posts);
    }

    // Get posts by a specific user
    public function getUserPosts($id)
    {
        $posts = Post::where('user_id', $id)->with('user', 'comments.user', 'likes')->get()->map(function ($post) {
            $post->comment_count = $post->comments()->count(); // Count the comments
            $post->like_count = $post->likes()->count(); // Count the likes

            // Modify each comment to include the username of the user who commented
            $post->comments->each(function ($comment) {
                $comment->username = $comment->user->username;
            });

            return $post;
        });

        return response()->json($posts);
    }

    // Get a specific post
    public function getPost($id)
    {
        $post = Post::findOrFail($id)->load('user', 'comments.user', 'likes');
        $post->comment_count = $post->comments()->count(); // Count the comments
        $post->like_count = $post->likes()->count(); // Count the likes

        // Modify each comment to include the username of the user who commented
        $post->comments->each(function ($comment) {
            $comment->username = $comment->user->username;
        });

        return response()->json($post);
    }

    // Delete a post
    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully.']);
    }
}
