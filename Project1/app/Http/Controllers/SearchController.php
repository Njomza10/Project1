<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $posts = Post::query()->where('title', 'LIKE', "%{$search}%")->
        orWhere('body', 'LIKE', "%{search}%")->get();

        return view ('posts.search',compact('posts'));
    }

    public function search()
    {
        return view('posts.search-page');
    }
}
