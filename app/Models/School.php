<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable=['name','location'];

    public function users(){
        return $this->belongsToMany('App\Models\Profile','profile_school','school_id','profiles_id');

    }
}
