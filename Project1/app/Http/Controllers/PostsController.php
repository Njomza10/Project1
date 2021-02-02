<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Like;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except(['show']);
    
    }

    public function index()
    {
        $posts = auth()->user()->posts()->with('category')->withCount('comments')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::query()->orderBy('name')->get();

        return view('posts.create', compact('categories'));
    }

    public function store(PostStoreRequest $request)
    {

        $data = $request->validated();

        $data['image'] = request('image')->store('uploads', 'public');

        auth()->user()->posts()->create($data);

        return redirect()->route('posts.index')->with('success', 'Post created!');
    }

    public function show($id)
    {

        $posts = Post::findOrFail($id);

        $comments = $posts->comments()->withCount('likes')->latest()->get();

        return view('posts.show', compact('posts', 'comments'));

    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::query()->orderBy('name')->get();

        return view('posts.edit', compact('post', 'categories'));

    }

    public function update(PostUpdateRequest $request, $id)
    {

        $post = auth()->user()->posts()->findOrFail($id);

        $data = $request->validated();

        if ($file = $request->file('image')) {

            $data['image'] = request('image')->store('uploads', 'public');
        }

        $post->update($data);

        return redirect()->route('posts.index', compact('post'))->with('success', 'Post edit');
    }

    public function destroy($id)
    {
        $post = auth()->user()->posts()->findOrFail($id);

        $post->delete();

        return redirect()->route('posts.index', compact('post'))->with('success', 'Post removed.');
    }
}
