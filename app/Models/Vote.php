<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
   protected $fillable=['vote_types_id','status_id','user_id'];
    public $timestamps=true;

    public function status(){
        return $this->belongsTo('App\Models\Status','status_id');
    }

    public function user(){
        return$this->belongsTo('App\Models\User','user_id');
    }

    public function vote_type(){
        return $this->belongsTo('App\Models\VoteType','vote_types_id');
    }
}
