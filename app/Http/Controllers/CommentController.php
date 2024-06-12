<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    // Method to store a new comment
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $comment = new Comment();
        $comment->body = $request->input('content');
        //$comment->user_id = auth()->id(); // assuming you have user authentication
        $comment->post_id = $request->postId;
        $comment->save();

        return response()->json(['message' => 'Comment added successfully', 'comment' => $comment], 200);
    }

    // Method to fetch comments for a post
    public function fetchComments($postId)
    {
        $post = Post::findOrFail($postId);
        $comments = $post->comments()->get()->toArray();

        return response()->json(['comments' => $comments], 200);
    }

    public function update(Request $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->body = $request->input('commentBody');
        $comment->save();

        return response()->json(['success' => true]);
    }

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        // Check if the authenticated user is the owner of the comment
        // if ($comment->user_id !== auth()->id()) {
        // return response()->json(['message' => 'Unauthorized'], 403);
        // }
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}
