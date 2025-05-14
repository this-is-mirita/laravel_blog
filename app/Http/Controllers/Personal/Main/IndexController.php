<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
class IndexController extends Controller
{
    public function __invoke()
    {

        dd(111111111);
        // TODO: Implement __invoke() method.
        return view('personal.main.index', [
            'userCount' => User::count(),
            'postCount' => Post::count(),
            'categoryCount' => Category::count(),
            'tagCount' => Tag::count(),
        ]);
    }
}
