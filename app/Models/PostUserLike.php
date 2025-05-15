<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostUserLike extends Model
{
    // привязка к таблице
    protected $table = 'post_user_likes';
    // разрешение
    protected $guarded = false;
}
