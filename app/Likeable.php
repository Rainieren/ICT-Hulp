<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

trait Likeable
{

    protected static function bootLikeable()
    {
        static::deleting(function ($model) {
            $model->likes->each->delete();
        });
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'liked');
    }

    public function like() {

        $userCheck = ['user_id' => auth()->id()];

        if (! $this->likes()->where($userCheck)->exists()) {
            $this->likes()->create($userCheck);
        }

    }

    public function unlike()
    {
        $userCheck = ['user_id' => auth()->id()];
        $this->likes()->where($userCheck)->delete();
    }

    public function isLiked() {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function getIsLikedAttribute()
    {
        return $this->isLiked();
    }

    public function getLikesCountAttribute()
    {
        return $this->likes->count();
    }
}
