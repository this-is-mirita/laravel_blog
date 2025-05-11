<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        // TODO: Implement __invoke() method.
        return view('admin.user.show', compact('user'));

    }
}
