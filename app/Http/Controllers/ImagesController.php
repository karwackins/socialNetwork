<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function userAvatar($id, $size)
    {
        $user_avatar = User::findOrFail($id);
        if(strpos($user_avatar->avatar, 'http') !== false)
        {
            $img = Image::make($user_avatar->avatar)->fit($size)->response('jpg', '100');

        } else
        {
            $avatar_path = asset('/storage/users/'. $id .'/avatars/'.$user_avatar->avatar);
            $img = Image::make($avatar_path)->fit($size)->response('jpg', '100');
        }


        return $img;

    }
}
