<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $table = 'comments';
    // разрешение
    protected $guarded = false;
    use HasFactory;
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // getter вызывается DateAsCarbon
    public function getDateAsCarbonAttribute(){
        return Carbon::parse($this->created_at);
    }
}
