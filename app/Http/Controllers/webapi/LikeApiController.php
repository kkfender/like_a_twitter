<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\User;
use App\Post;

class LikeApiController extends Controller
{
    public function store(Request $request)
    {
        $like = new Like;


        $like->user_id = $request->user;
        $like->post_id = $request->post;

        $like->save();

        return Like::where('post_id', $request->post)->count();
    }

    public function delete(Request $request)
    {
        $like = Like::where('user_id',$request->user)
                    ->where('post_id',$request->post)
                    ;

        $like->delete();

        return Like::where('post_id', $request->post)->count();
    }
}
