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

    protected $withCount = ['likedUsers'];
    use softDeletes;

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id')->take(4);
    }



    public function likedUsers() {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }


    public function comments() {
        return $this->hasMany(Comment::class,  'post_id', 'id');
    }

}
