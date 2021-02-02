<?php

namespace App\Http\Controllers;

use App\Dislike;
use App\Http\Requests\CommentStoreRequest;
use App\Like;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{


    public function store(Request $request, $post_id)
    {
        
        $post = Post::findOrFail($post_id);

        $post->comments()->create([
            'description' => $request->get('description'),
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Comment wrote!');

    }


}
