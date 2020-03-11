<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\User;
use App\Post;
class LikeController extends Controller
{
    public function store(Request $request ,$user,$post)
    {

        $like_data = new Like;
        $like_data->user_id = $user;
        $like_data->post_id = $post;
        $like_data->save();

        return redirect('/');
    }

    public function destroy(Request $request ,$user,$post)
    {
        $like_data = new Like;
        $like_data = $like_data->where('user_id', $user)->where('post_id', $post)->first();

        $like_data->destroy($like_data->id);

        return redirect('/');

    }
}
