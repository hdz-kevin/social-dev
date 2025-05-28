<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Render the home page by loading user posts that the user follows.
     */
    public function __invoke(Request $request)
    {
        $posts = new Collection([]);

        if (auth()->check()) {
            $userIds = $request->user()->following->pluck('id');
            $posts = Post::whereIn('user_id', $userIds)->latest()->get();
        }

        return view('home', [
            'posts' => $posts,
        ]);
    }
}
