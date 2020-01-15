<?php

use App\Friend;

function friendship($friend_id)
{
    $a = $friend_id;
    $b = Auth::id();

    $friend_query = Friend::where(function ($query) use( $a, $b) {
        $query->where('user_id', $b);
        $query->where('friend_id', $a);
    })->orWhere(function ($query) use( $a, $b){
        $query->where('user_id', $a);
        $query->where('friend_id', $b);
    })->first();


    $friendship = new stdClass();

    if ( ! is_null($friend_query)) {
        $friendship->exists = true;
        $friendship->accepted = $friend_query->accept;
    } else {
        $friendship->exists = false;
        $friendship->accepted = false;
    }

    return $friendship;
}

function check_invite($friend_id)
{
    return Friend::where([
        'user_id' => $friend_id,
        'friend_id' => Auth::id(),
        'accept' => 0,
    ])->exists();
}
