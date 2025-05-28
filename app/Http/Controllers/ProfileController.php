<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Intervention\Image\Laravel\Facades\Image;

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
        $posts = $user->posts()->latest()->paginate(10);

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

    /**
     * Update the user's profile.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $request->merge(['username' => Str::slug($request->username)])
                ->validate([
                    'username' => 'required|string|max:255|unique:users,username,' . $user->id,
                    'image' => 'nullable|image',
                ]);

        if ($img = $request->file('image')) {
            $imgName = Str::uuid() . "." . $img->extension();
            $imgPath = public_path('profiles') . "/" . $imgName;

            Image::read($img)
                    ->cover(1000, 1000)
                    ->toPng()
                    ->save($imgPath);

            $user->image = $imgName;
        }

        $user->username = $request->username;
        $user->save();

        return redirect()->route('profile.show', $user->username);
    }
}
