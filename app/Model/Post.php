<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Post extends Model
{
    protected $fillable = ['content', 'user_id'];

    public static function postCreate($content, $userId)
    {
        $post = new Post();

        $post->fill(['content' => $content]);
        $post->fill(['user_id' => $userId]);

        $post->save();
    }
}
