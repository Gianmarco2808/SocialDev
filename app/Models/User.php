<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    //comprobar el seguimiento
    public function siguiendo(User $user){
        return $this->followers->contains($user->id);
    }

    //almacena los seguidores de un usuario
    public function followers(){
        return $this->belongsToMany(User::class, 'followers','user_id','follower_id');
    }

    //almacen los que sigues
    public function followings(){
        return $this->belongsToMany(User::class, 'followers','follower_id','user_id');
    }
}
