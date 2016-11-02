<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable=['profiles_id'];
    public $timestamps=false;

    //all games books movies and sports have many user who like
    //them and they are liked by many

    //all likes belong to a single profile
    public function profile(){
        return $this->belongsTo('App\Models\Profile');
    }

    public function books(){
        return $this->belongsToMany('App\Models\Books','likes_books','likes_id','books_id');
    }

    public function games(){
        return $this->belongsToMany('App\Models\Game','likes_games','likes_id','games_id');
    }

    public function movies(){
        return $this->belongsToMany('App\Models\Movie','likes_movies','likes_id','movies_id');
    }

    public function musics(){
        return $this->belongsToMany('App\Models\Music','likes_musics','likes_id','musics_id');
    }

    public function sports(){
        return $this->belongsToMany('App\Models\Sport','likes_sports','likes_id','sports_id');
    }

}
