<?php

namespace App;
use App\User;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'post_id', 'content'];

    function User()
    {
        return $this->belongsTo('App\User');
    }

    function Post()
    {
        return $this->belongsTo('App\Post');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
