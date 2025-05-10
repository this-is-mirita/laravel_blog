<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // привязка к таблице
    protected $table = 'posts';
    // разрешение
    protected $guarded = false;
    use softDeletes;

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
