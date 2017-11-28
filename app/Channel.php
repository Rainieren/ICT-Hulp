<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{

    public $fillable = [
        'channel_name', 'slug'
    ];

    public function getRouteKey()
    {
        return 'slug';
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function adminDeletePath() {

        return "/adminpanel/kanalen/{$this->slug}/delete";
    }

}
