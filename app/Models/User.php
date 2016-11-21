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
    use Notifiable
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
        return $this->hasOne('App\Models\Profile');
    }

    public function status(){
        return $this->hasMany('App\Models\Status');
    }

    public function loves(){
        return $this->hasMany('App\Models\Love');
    }

    public function votes(){
        return $this->hasMany('App\Models\Vote');
    }

    public function notifications(){
        return $this->hasMany('App\Models\Notification');
    }

    public function followers(){
        return $this->hasMany('App\Models\Following','leader');
    }

    public function leaders(){
        return $this->hasMany('App\Models\Following','follower');
    }

    public function interestedIn(){
        return $this->hasMany('App\Models\Interest','shower');
    }

    public function InTheirInterest(){
        return $this->hasMany('App\Models\Interest','subject');
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
