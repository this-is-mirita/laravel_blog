<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
class IndexController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        $posts = auth()->user()->likedPosts;
        return view('personal.liked.index', compact('posts'));
    }
}
