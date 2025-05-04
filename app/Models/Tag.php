<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // привязка к таблице
    protected $table = 'tags';
    // разрешение
    protected $guarded = false;
}
