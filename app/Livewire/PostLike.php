<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;

class PostLike extends Component
{
    public Post $post;
    /** check if authenticated user liked the post */
    public bool $userLiked;
    /** Post likes number */
    public int $likes;

    public function mount(Post $post)
    {
        $this->userLiked = $post->checkLike(auth()->user()) instanceof Like;
        $this->likes = $post->likes->count();
    }

    /**
     * Handle the like and dislike for a post.
     */
    public function like(): void
    {
        if ($like = $this->post->checkLike(auth()->user())) {
            $like->delete();
            $this->userLiked = false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->userLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.post-like');
    }
}
