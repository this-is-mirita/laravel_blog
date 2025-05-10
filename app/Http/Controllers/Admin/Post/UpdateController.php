<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        // TODO: Implement __invoke() method.
        $date = $request->validated();
        $post->update($date);
        return view('admin.post.show', compact('post'));

    }
}
