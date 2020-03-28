<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // protected $fillable=['content','user_id','post_id'];
    protected $fillable=['content','commentable_id','commentable_type','user_id'];
    //
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    // public function post()
    // {
    //     return $this->belongsTo('App\Post');
    // }
    public function commentable()
    {
        return $this->morphTo();
    }
}
