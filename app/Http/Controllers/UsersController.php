<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Friend;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('user_permission',['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $friends = $user->friends();

        $id_mine_friends = [];
        foreach ($friends as $friend)
        {
            $id_mine_friends[] = $friend->id;
        }
        $id_mine_friends[] = $user->id;

        $posts_id= Post::whereIn('user_id', $id_mine_friends)->orderBy('created_at', 'desc')->get();
        $posts= Post::whereIn('user_id', $id_mine_friends)->orderBy('created_at', 'desc')->paginate(10);
        $id_posts = [];
        foreach ($posts_id as $post)
        {
            $id_posts[] = $post->id;
        }

        $comments = Comment::whereIn('post_id', $id_posts)->orderBy('created_at', 'desc')->limit(5)->get();

        return view('users.show', compact('user','posts', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
           'name' => 'required|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],

        ],[
            'required' => 'Pole jest wymagane',
            'unique' => 'Inny użytkownik ma już taki adres e-mail',
        ]);


        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;

        if($request->file('avatar'))
        {
            $upload_path = 'public/users/' .$id. '/avatars';
            $path = $request->file('avatar')->store($upload_path);
            $avatar_filename = str_replace($upload_path.'/','',$path);
            $user->avatar = $avatar_filename;
        }
        $user->save();


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
