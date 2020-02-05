<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Friend;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function friendsOfOther()
    {
        return $this->belongsToMany('App\User','friends','user_id', 'friend_id')
            ->wherePivot('accept', 1);
    }

    function friendsOfMine()
    {
        return $this->belongsToMany('App\User','friends','friend_id', 'user_id')
            ->wherePivot('accept', 1);
    }

    function friends()
    {
        return $this->friendsOfOther->merge($this->friendsOfMine);
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
