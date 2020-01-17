<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function userAvatar($id, $size)
    {
        $user = User::findOrFail($id);
        if(is_null($user->avatar))
        {
            if($user->sex == 'm' )
                $img = Image::make('https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male-512.png')->fit($size)->response('png', '100');
            else
                $img = Image::make('https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_female-512.png')->fit($size)->response('png', '100');

        } elseif(strpos($user->avatar, 'http') !== false)
        {
            $img = Image::make($user->avatar)->fit($size)->response('jpg', '100');
        } else
        {

            $avatar_path = asset('/storage/users/'. $id .'/avatars/'.$user->avatar);
            $img = Image::make($avatar_path)->fit($size)->response('jpg', '100');
        }
        return $img;

    }
}
