<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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
        $postData = DB::table('users')
                        ->join('posts','user_id','=','users.id')
                        ->select('*')
                        ->orderBy('posts.created_at', 'desc')
                        ->get();

        $now = Carbon::now();

    foreach ($postData as $postDatum)
    {
        $postTime = new Carbon($postDatum->created_at);

        if(!$postTime->isSameYear($now))
        {
            //日付を返す
            $postDatum->created_at = $postTime->format('Y年m月d日');
        }
        else if(!$postTime->isSameMonth($now))
        {
            //日付を返す
            $postDatum->created_at = $postTime->format('Y年m月d日');
        }
        else if(!$postTime->isSameDay($now))
        {
            //日付を返す
            $postDatum->created_at = $postTime->format('Y年m月d日');
        }
        else if(!$postTime->isSameHour($now))
        {
            //何時間前かを返す
            $postDatum->created_at = $postTime->diffInHours($now).'時間前';
        }
        else if(!$postTime->isSameMinute($now))
        {
            //何分前かを返す
            $postDatum->created_at = $postTime->diffInMinutes($now).'分前';
        }
        else if(!$postTime->isSameSecond($now))
        {
            //何秒前
            $postDatum->created_at = $postTime->diffInSeconds($now).'秒前';
        }
        else
        {
            $postDatum->created_at= 'now!';
        }
    }
         return $postData;
    }
}
