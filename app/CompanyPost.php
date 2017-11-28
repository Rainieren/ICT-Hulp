<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPost extends Model
{
    protected $fillable = [
        'user_id', 'title', 'text', 'slug', 'company_id', 'channel_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }


    public function channel() {
        return $this->belongsTo('App\Channel');
    }

    public function images() {
        return $this->hasMany('App\CompanyPostImg');
    }

    //Haalt de owner omhoog
    public function owner() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function path() {
        return '/aanbieders/'. $this->slug;
//        return "/questions/{$this->channel->slug}/{$this->slug}";
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }

        $this->attributes['slug'] = $slug;
    }

    public function incrementSlug($slug) {

        $max = static::whereTitle($this->title)->latest('id')->value('slug');

        if (is_numeric($max[-1])) {
            return preg_replace_callback('/(\d+)$/', function ($matches) {
                return $matches[1] + 1;
            }, $max);
        }

        return "($slug)-2";
    }
}
