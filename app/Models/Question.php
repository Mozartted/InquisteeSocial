<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['user_id','subject_id','answer_type_id'];
    public $timestamps=true;

    /*
    |--------------------------------------------------------------------------
    |  Relationships
    |--------------------------------------------------------------------------
    |
    | The following section describe the relationships between the models
    | and other models out there in the wild, just kidding, the link
    | is with the AnswerType model
    |
    */
    public function answer(){
        return $this->hasOne('App\Models\AnswerType');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function subject(){
        return $this->belongsTo('App\Models\User','subject_id');
    }

}
