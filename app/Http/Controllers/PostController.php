<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Model\Post;


class PostController extends Controller
{
    public function post(Request $request)
    {
        dd($request->content);
    }
}
