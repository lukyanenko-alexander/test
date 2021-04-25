<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostObserver
{
    /**
     * @param Post $post
     */
    public function creating(Post $post)
    {
        $post->user_id = Auth::id();
    }
}
