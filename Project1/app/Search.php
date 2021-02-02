<?php

namespace App;

use App\Http\Requests\PostStoreRequest;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
  public function posts() {
      return $this->belongsTo(Post::class);
  }
  public function user() {
      return $this->belongsTo(User::class);
  }
}
