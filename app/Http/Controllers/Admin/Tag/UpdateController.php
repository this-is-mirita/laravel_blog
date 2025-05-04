<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        // TODO: Implement __invoke() method.
        $date = $request->validated();
        $tag->update($date);
        return view('admin.tag.show', compact('tag'));

    }
}
