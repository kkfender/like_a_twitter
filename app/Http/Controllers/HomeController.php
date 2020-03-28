<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Like;
use App\Http\Controllers\Auth;
use Illuminate\Session\SessionManager;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        //ログインしていたら
        if(\Auth::check())
        {
            $user = \Auth::user();
dd($user->profile()->toSql());

            $posts = User::getMyPost($user['id']);
            foreach($posts as $post)
            {
                if(Like::where('user_id', $user->id)->where('post_id',$post->id)->first())
                {
                    $post->liked = true;
                    $post->count = Like::where('post_id',$post->id)->count();
                    //TODO クエリの発行数を抑えるためにリレーションで行う
                }
                else
                {
                    $post->liked = false;
                    $post->count = Like::where('post_id',$post->id)->count();
                }
            }
            return view('home',compact('user', 'posts'));
        }
        else
        {

            return redirect('/login');
        }
    }
}
