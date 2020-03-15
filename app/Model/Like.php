<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'post_id'];

    public function Post()
    {
      return $this->belongsTo('App\Post');
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }

    public static function getLikeCountsAttribute($postId)
    {

        return Like::where('post_id', $postId)->count();
    }
}
