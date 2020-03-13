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
        \Debugbar::info($request->user,$request->post,);

        return;
    }
}
