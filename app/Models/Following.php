<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    protected $fillable=[
        'leader',
        'follower'
    ];

    public $timestamps=true;

    public function leading(){
        return $this->belongsTo('App\Models\User','leader');
    }

    public function following(){
        return $this->belongsTo('App\Models\User','follower');
    }
}
