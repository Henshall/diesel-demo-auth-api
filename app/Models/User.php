<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Throwable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model 
{

    protected $guarded = [];
}