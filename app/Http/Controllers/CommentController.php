<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Save a new post comment in database.
     */
    public function store(Request $request, User $user, Post $post): RedirectResponse
    {
        $data = $request->validate(['comment' => 'required|string|max:1024']);

        Comment::create([
            'user_id' => $request->user()->id,
            'post_id' => $post->id,
            'comment' => $data['comment'],
        ]);

        return back()->with([
            'message' => 'Comment made correctly',
        ]);
    }
}
