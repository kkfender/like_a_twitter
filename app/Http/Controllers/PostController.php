<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Validator;



class PostController extends Controller
{

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'content' => 'required|max:255',
       ]);

       if ($validator->fails()) {
           return redirect('/')
                       ->withErrors($validator)
                       ->withInput();
       }

        $user = Auth::user();

        Post::postCreate($request['content'], $user['id']);

        return redirect('')->with('flash_message', '投稿が完了しました');


    }

    public function Delete($id)
    {

        $post = Post::find($id);

        $post->delete();

        return redirect('')->with('flash_message', '投稿を削除しました');
    }
}
