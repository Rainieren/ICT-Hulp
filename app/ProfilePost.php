<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilePost extends Model
{
    protected $fillable = [
        'user_id', 'text',
    ];

    public function images() {
        return $this->hasMany('App/ProfilepostImg');
    }
}
