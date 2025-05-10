<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Post;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        // TODO: Implement __invoke() method.
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
