<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Add a comment to a post
    public function addComment($id, Request $request)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        $comment = Comment::create([
            'post_id' => $id,
            'user_id' => $request->user()->id,
            'comment' => $request->comment,
        ]);

        return response()->json($comment, 201);
    }

    // Get comments of a post
    public function getComments($id)
    {
        $comments = Comment::where('post_id', $id)->get();
        return response()->json($comments);
    }

    // Delete a comment
    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return response()->json(['message' => 'Comment deleted successfully.']);
    }
}
