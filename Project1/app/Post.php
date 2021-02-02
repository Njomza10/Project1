<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{

    protected $fillable = ['title', 'body', 'image', 'category_id','description'];

    protected $dates = ['created_at', 'updated_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class , 'post_id');
    }

    public function search() {
        return $this->hasMany(Search::class);
    }

    //ATTRIBUTES
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }

}
