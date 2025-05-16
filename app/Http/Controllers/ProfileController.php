<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Renders the user profile with their posts.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user)
    {
        $posts = $user->posts;

        return view('profile', compact('user', 'posts'));
    }
}
