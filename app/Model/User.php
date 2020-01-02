<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['user_name'];


    public static function getPost($userId)
    {
        $userName = User::where('id', $userId)->pluck('name')->first();
        $postData = DB::table('users')
                        ->join('posts','user_id','=','users.id')
                        ->select('*')
                        ->get();


         dd($postData);
         $postData = Post::where('user_id', $userId)->get();

         //dd(2);
         dd($postData);
         return $postData;
    }
}
