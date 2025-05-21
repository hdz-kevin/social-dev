<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    /**
     * Handle the like and dislike action for a post.
     *
     * @param Request $request
     * @param Post $post
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, User $user, Post $post)
    {
        if ($like = $post->checkLike($request->user())) {
            $like->delete();
        } else {
            $post->likes()->create([
                'user_id' => $request->user()->id,
            ]);
        }

        return back();
    }
}
