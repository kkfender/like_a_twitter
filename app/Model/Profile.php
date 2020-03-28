<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    //relation
    Public function user()
    {
        return $this->belongsTo(User::class);
    }
}
