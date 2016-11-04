<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
        'users_id',
        'birthday',
        'first_name',
        'last_name',
        'gender',
        'profile_pic',
        'cover_pic',
        'about',
    ];

    public $timestamps=true;

    //Relationships
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function like(){
        return $this->hasOne('App\Models\Like');
    }

    public function media(){
        return $this->hasMany('App\Models\Media','profile_pic');
    }

    public function schools(){
        return $this->belongsToMany('App\Models\School','profile_school','profiles_id','school_id');
    }

    public function profilePic(){
        return $this->belongsTo('App\Models\Media','profile_pic');
    }

    public function cover_pic(){
        return $this->belongsTo('App\Models\Media','cover_pic');
    }



}
