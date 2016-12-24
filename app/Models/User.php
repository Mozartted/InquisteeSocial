<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','profiles_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne('App\Models\Profile','users_id');
    }

    public function status(){
        return $this->hasMany('App\Models\Status');
    }

    public function commends(){
      return $this->hasMany('App\Models\Commend');
    }

    public function loves(){
        return $this->hasMany('App\Models\Love','user_id');
    }

    public function votes(){
        return $this->hasMany('App\Models\Vote');
    }

    public function notifications(){
        return $this->hasMany('App\Models\Notification');
    }

    public function followers(){
        return $this->belongsToMany('App\Models\User','followings','leader','follower')->withTimestamps();
    }

    public function leaders(){
        return $this->belongsToMany('App\Models\User','followings','follower','leader')->withTimestamps();
    }

    public function interestedIn(){
        return $this->belongsToMany('App\Models\User','interests','shower','subject')->withTimestamps();
    }

    public function InTheirInterest(){
        return $this->belongsToMany('App\Models\User','interests','subject','shower')->withTimestamps();
    }

    /*
    |----------------------------------------------------------------
    | Static Registration function
    |________________________________________________________________
    |
    | All code associated with registering a new user
    |
    */


}
