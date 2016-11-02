<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table='musics';

    public $timestamps=true;
    protected $fillable=['genre'];


    //all games books movies and sports have many user who like
    //them and they are liked by many


    public function like(){
        return $this->belongsToMany('App\Models\Like','likes_musics','musics_id','likes_id');
    }
}
