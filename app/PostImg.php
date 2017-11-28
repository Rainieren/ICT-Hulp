<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImg extends Model
{
    protected $fillable = [
        'post_id', 'imglink'
    ];

    public function image() {
        return $this->belongsTo('App/Post');
    }
}
