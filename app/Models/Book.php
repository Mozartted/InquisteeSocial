<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps=true;
    protected $fillable=['category'];

    public function like(){
        return $this->belongsToMany('App\Models\Like','likes_books','books_id','likes_id');
    }

}
