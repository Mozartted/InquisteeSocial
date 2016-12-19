<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $fillable=[
        'type',
        'url'
    ];

    public $timestamps=true;


    public function profile(){
        return $this->belongsTo('App\Models\Profile','profiles_id');
    }

    public function status(){
        return $this->belongsToMany('App\Models\Media','status_media','media_id','status_id')->withTimestamps();
    }
}
