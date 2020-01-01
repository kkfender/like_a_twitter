<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{

    public function post(Request $request)
    {
        $user = Auth::user();

        Post::postCreate($request['content'], $user['id']);

        return view('home', compact('user'))->with('status', 'Profile updated!');

    }
}
