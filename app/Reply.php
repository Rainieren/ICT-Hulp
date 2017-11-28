<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Likeable;

    protected $guarded = [];

//    protected $fillable = [
//        'user_id', 'post_id', 'reply_text',
//    ];

    protected $with = ['owner', 'likes'];

    protected $appends = ['likesCount', 'isLiked'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function likes() {
        return $this->morphMany('App\Like', 'liked');
    }

    public function owner() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
