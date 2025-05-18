<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the Posts.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new Post.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created Post in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required',
        ], [
            'image.required' => 'The post image is required'
        ]);

        // Post::create([...$data, 'user_id' => auth()->id()]);
        // Creando un post usando relaciones. El post será relacionado con $request->user(). 
        $request->user()->posts()->create($data);

        return redirect()->route('profile.show', auth()->user()->username);
    }

    /**
     * Display the specified Post.
     */
    public function show(User $user, Post $post)
    {
        return view('posts.show', compact('user', 'post'));
    }

    /**
     * Show the form for editing the specified Post.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified Post in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified Post from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
