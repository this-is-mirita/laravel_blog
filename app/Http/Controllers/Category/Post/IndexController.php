<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        // TODO: Implement __invoke() method.
        $posts = $category->posts()->paginate(3);
        $categoryTitle = $category->title;

        return view('category.post.index', compact('posts', 'categoryTitle'));

    }
}
