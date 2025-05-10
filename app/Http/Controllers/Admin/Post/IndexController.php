<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));

    }
}
