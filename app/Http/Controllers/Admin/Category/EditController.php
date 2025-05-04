<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(Category $category)
    {
        // TODO: Implement __invoke() method.
        return view('admin.categories.edit', compact('category'));

    }
}
