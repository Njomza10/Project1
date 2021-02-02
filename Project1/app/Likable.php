<?php


namespace App;


trait Likable
{


    public function like($id)
    {
        $this->likes()->create([
            'user_id' => auth()->id(),
            'comment_id'=> $id,
            'liked'=>true,
        ]);
    }

    public function dislike()
    {
        return $this->like(false);
    }

    public function isLikedBy(User $user, $id)
    {
        return (bool)$user->likes()->where('comment_id', $this->$id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user,$id)
    {

        return (bool)$user->likes()->where('comment_id', $this->$id)->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
