<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $friends = User::findOrFail($user_id)->friends();
        return view('friends.index', compact('friends'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add($friend_id)
    {
        if(!friendship($friend_id)->exists)
        {
            Friend::create([
                'friend_id' => $friend_id,
                'user_id' => Auth::id(),
            ]);
        } else
        {
            $this->accept($friend_id);
        }


        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($friend_id)
    {
            Friend::where([
                'friend_id' => Auth::id(),
                'user_id' => $friend_id,
            ])->update([
                'accept' => 1
            ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($friend_id)
    {
        $user_id = Auth::id();

        Friend::where(function ($query) use ($friend_id, $user_id) {
            $query->where('user_id', $user_id);
            $query->where('friend_id', $friend_id);
        })->orWhere(function ($query) use ($friend_id, $user_id) {
            $query->where('user_id', $friend_id);
            $query->where('friend_id', $user_id)->delete();
        });
        return back();
    }

}
