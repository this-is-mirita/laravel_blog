<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\controller;
use App\Models\Category;
use App\Models\Post;

class VueIndexController extends controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json($category);  // Возвращаем данные в формате JSON
    }

}
