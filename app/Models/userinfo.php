<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class userinfo extends Model
{
    use HasFactory,Authenticatable, Notifiable;
    protected $fillable = [
        'fullname',
        'username',
        'address',
        'password',
        'mobile',
        'bloodtype',
        'age',

    ];

}
