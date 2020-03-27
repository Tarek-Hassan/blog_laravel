<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $table = 'post';
    protected $fillable = [
        'title', 'describtion','user_id'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
