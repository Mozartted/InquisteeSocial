<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable=['user_id','status_text'];

    protected $table='status';

    public function owner(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function loves(){
        return $this->hasMany('App\Models\Love','status_id');
    }

    public function media(){
        return $this->belongsToMany('App\Models\Media','status_media','status_id','media_id');
    }

    public function commends(){
        return $this->hasMany('App\Models\Commend','status_id');
    }

    public function votes(){
        return $this->hasMany('App\Models\Vote','user_id');
    }
}
