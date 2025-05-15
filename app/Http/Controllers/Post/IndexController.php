<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        $posts = Post::paginate(6);

        $randomPosts = Post::inRandomOrder()->take(4)->get();
        $likePosts = Post::withCount('likedUsers')
            ->orderByDesc('liked_users_count')
            ->take(4)
            ->get();

        return view('post.index', compact('posts', 'randomPosts', 'likePosts'));

    }
}
