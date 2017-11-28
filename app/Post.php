<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

//    protected $fillable = [
//        'user_id', 'title', 'channel_id', 'text', 'slug'
//    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function replies() {
        return $this->hasMany('App\Reply');
    }

    public function channel() {
        return $this->belongsTo('App\Channel');
    }

    public function images() {
        return $this->hasMany('App\PostImg');
    }

    // Automatisch pad
    public function path() {

        return "/vragen/{$this->channel->slug}/{$this->slug}";
    }

    public function adminDelete() {

        return "/adminpanel/berichten/delete/{$this->slug}";
    }

    public function addReply($reply)
    {
        return $this->replies()->create($reply);
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
