<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilepostImg extends Model
{
    protected $fillable = [
        'profilepost_id', 'imglink'
    ];


    public function image() {
        return $this->belongsTo('App/ProfilePost');
    }
}
