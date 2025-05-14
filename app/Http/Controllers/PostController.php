<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        //
    }

    /**
     * Display the specified Post.
     */
    public function show(Post $post)
    {
        //
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
