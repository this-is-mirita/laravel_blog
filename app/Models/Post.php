<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // привязка к таблице
    protected $table = 'posts';
    // разрешение
    protected $guarded = false;
}
