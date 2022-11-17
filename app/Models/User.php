<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Notifications\Notifiable;
// use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
// use Illuminate\Contracts\Auth\Authenticatable;

//punya github yang baru 
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Jenssegers\Mongodb\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
// use Laravel\Sanctum\Contracts\HasAbilities;

class User extends Model implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract,
MustVerifyEmailContract
{
    use HasApiTokens ,HasFactory, Notifiable;
    use Authenticatable, Authorizable, CanResetPassword,MustVerifyEmail;
    
    

  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = 'mongodb';
    // protected $collection = 'User';

    protected $fillable = [
        'name','username' ,'email', 'password', 'profile_image',

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
}
