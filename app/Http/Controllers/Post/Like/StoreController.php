<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        // TODO: Implement __invoke() method.
        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->back();
    }
}
