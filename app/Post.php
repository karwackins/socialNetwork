<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'content',
    ];

    function User()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        if(is_admin())
        {
            return $this->hasMany('App\Comment')->withTrashed();
        } else
        {
            return $this->hasMany('App\Comment');
        }
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
