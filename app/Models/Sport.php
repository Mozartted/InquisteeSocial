<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $table='sports';

    public $timestamps=true;
    protected $fillable=['name'];


    //all games books movies and sports have many user who like
    //them and they are liked by many


    public function like(){
        return $this->belongsToMany('App\Models\Like','likes_sports','sports_id','likes_id');
    }
}
