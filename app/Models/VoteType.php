<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteType extends Model
{
    protected $table="vote_types";
    protected $fillable=['vote_type','value'];
    public $timestamps=true;

    public function votes(){
        $this->hasMany('App\Models\Vote','vote_types_id');
    }
}
