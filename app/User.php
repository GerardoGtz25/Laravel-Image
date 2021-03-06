<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'avatar', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages(){
        return $this->hasMany(Message::class)->orderBy('created_at', 'desc');
    }
 
    // SE MANDA POR PARAMETRO EL NOMBRE DE LA TABLA ID Y FOREIGN KEY
    public function follows(){
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'followed_id');
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'user_id');
    }
}
