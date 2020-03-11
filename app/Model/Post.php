<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Like;


class Post extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
  {
    return $this->hasMany('App\Like');
  }

  public function like_by()
  {
    return Like::where('user_id', \Auth::user()->id)->first();
  }

    public static function postCreate($content, $userId)
    {
        $post = new Post();

        $post->fill(['content' => $content]);
        $post->fill(['user_id' => $userId]);

        $post->save();
    }
}
