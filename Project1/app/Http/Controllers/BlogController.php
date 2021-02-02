<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'user')->latest()->paginate(6);

        return view('blog.index',compact('posts'));
    }

    public function show(Request $request)
    {

        $category = $request->id;

        $posts = Post::when($category,function($query , $category) {
            return $query->whereHas('category',function($query) use ($category) {
                $query->whereIn('id',[$category]);
            });
        })->latest()->paginate(6);

        return view('blog.index', compact('posts'));

    }

}
