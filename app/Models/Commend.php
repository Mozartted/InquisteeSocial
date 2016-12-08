<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commend extends Model
{
    protected $fillable=['status_id','user_id','commend',];
    public $timestamps=true;

    public function status(){
        return $this->belongsTo('App\Models\Status','status_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
