<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class EditController extends Controller
{
    public function __invoke(Post $post)
    {
        // TODO: Implement __invoke() method.
        return view('admin.post.edit', compact('post'));

    }
}
