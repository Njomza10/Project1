<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\Post;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($id, Like $like)
    {
        $user = Auth::user()->id;
        $like_user = Like::where(['user_id' => $user, 'comment_id' => $id])->first();
        if (empty($like_user->user_id)) {
            $user_id = $user;
            $comment_id = $id;
            $like->likes()->create([
                $like->user_id = $user_id,
                $like->comment_id = $comment_id,
                ]);
            $like->save();

        }
        return back()->with('success','You like this comment!');

        }

    public function destroy(Comment $comment)
    {
        $comment->dislike();
    }
}
