<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $table="school";
    protected $fillable=['name','location'];
    public $timestamps=false;


    public function users(){
        return $this->belongsToMany('App\Models\Profile','profile_school','school_id','profiles_id')->withPivot('admission','graduation');
    }
}
