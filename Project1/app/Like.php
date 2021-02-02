<?php

namespace App;

use App\Comment;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
