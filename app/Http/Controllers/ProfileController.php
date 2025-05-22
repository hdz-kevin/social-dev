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
        $posts = $user->posts()->paginate(10);

        return view('profile', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the user's profile.
     *
     * @param User $user
     * @return View
     */
    public function edit(Request $request, User $user)
    {
        $this->authorize('edit', $user);

        return view('profile.edit', compact('user'));
    }
}
