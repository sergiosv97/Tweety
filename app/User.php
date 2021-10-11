<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded  = [];

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
        return asset($value ?: '/images/default-avatar.jpg'); 
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

    public function path($append = '') //this
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    
    public function follow(User $user) {
        return $this->follows()->save($user); 
    }


    public function follows() {
        return $this->belongsToMany(
            User::class,
             'follows','user_id',
             'following_user_id'
             );
    }

    

}
