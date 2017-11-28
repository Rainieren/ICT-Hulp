<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPostImg extends Model
{

    protected $fillable = [
        'companypost_id', 'imglink'
    ];

    public function image() {
        return $this->belongsTo('App/CompanyPost');
    }
}
