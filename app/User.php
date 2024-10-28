<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'avatar', 'header'
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

    public function timeline() 
    {
        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);

        return Tweet::whereIn('user_id', $ids)->latest()->get();
    }

    public function tweets() {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getAvatarAttribute($value) 
    {
        if ($value) {
            return asset($value);
        }

        return "https://avatar.iran.liara.run/public/" . $this->id;
    }

    public function setPasswordAttribute($value) 
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * The follows that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function follow(User $user) {
        return $this->follows()->save($user);
    }
    
    public function unfollow(User $user) {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user) {
        if ($this->following($user)) {
            return $this->unfollow($user);
        } else {
            return $this->follow($user);
        }
    }
    public function following(User $user) {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }
}
