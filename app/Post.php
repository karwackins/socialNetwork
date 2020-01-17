<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'content',
    ];

    function User()
    {
        return $this->belongsTo('App\User');
    }
}
