<?php

namespace App;

use Log;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public function getAvatarAttribute($value) {
        return $value ? $value: 'default-avatar.jpg'; 
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline() {
       //include all of the ursers tweets. as well as the tweets everyone, as well as the tweets everyone, they follow, in descerding order by date
        $friends = $this->follows->pluck('id');

        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id',$this->id)
            ->withLikes()
            ->latest()
            ->paginate(50);
    }

    public function tweets() //this
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function path($append = '') //this
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

///////////////////////////////////////////////////////////////////


    public function posts()
        {
        return $this->hasMany(Post::class);
        }

     public function getAvatarAttribute1($value) {
        return $value ? $value: 'default-avatar.jpg'; 
    }

    public function path1($append = '')
    {
        $path = route('post', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }
    
    public function timeline1() {
        $posts = Post::where('user_id', 7)->get();
        return $posts;
     }

}
