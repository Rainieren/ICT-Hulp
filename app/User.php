<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','firstname', 'lastname',
        'username', 'date_of_birth', 'email',
        'phonenumber', 'function', 'description',
        'password', 'avatar_path', 'banner_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', 'date_of_birth', 'phonenumber'
    ];

    protected $casts = [
      'confirmed' => 'boolean'
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    //Relaties maken
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    /**
     * @return string
     */
    public function avatar()
    {
        if (! $this->avatar_path) {
            return '/images/avatars/placeholder.png';
        }
        return '/storage/' . $this->avatar_path;
    }

    // Rollen
    public function isUser() {
        if(Auth::check()) {
            return(Auth::user()->role_id == 1);
        }
        return false;
    }

    public function isAdmin() {
        if(Auth::check()) {
            return(Auth::user()->role_id == 2);
        }

        return false;
    }

    public function isModerator() {
        if(Auth::check()) {
            return(Auth::user()->role_id == 3);
        }
        return false;
    }

    public function isCompany() {
        if(Auth::check()) {
            return(Auth::user()->role_name == 4);
        }
        return false;
    }

    public function confirm() {
        $this->confirmed = true;

        $this->save();
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
