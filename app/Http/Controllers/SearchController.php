<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class SearchController extends Controller
{
    public function Users()
    {
        $search_phrase = Input::get('q');
        $search_result = User::where('name', 'like', '%'.$search_phrase.'%')->paginate(9);

        return view('search.users', compact('search_result'));
    }
}
