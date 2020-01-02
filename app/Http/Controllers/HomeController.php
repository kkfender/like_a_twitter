<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
<<<<<<< HEAD

        //ログインしていたら
        if(\Auth::check())
        {

            $user = \Auth::user();
            $posts = User::getPost($user['id']);

=======
        //ログインしていたら
        if(\Auth::check())
        {
            $user = \Auth::user();
            $posts = User::getPost($user['id']);
>>>>>>> #7
            return view('home',compact('user', 'posts'));
        }
        else
        {
<<<<<<< HEAD

            return redirect('/login');
=======
            return view('home');
>>>>>>> #7
        }
    }
}
