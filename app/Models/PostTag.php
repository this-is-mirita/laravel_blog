<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    // привязка к таблице
    protected $table = 'post_tags';
    // разрешение
    protected $guarded = false;
}
