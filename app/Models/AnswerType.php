<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerType extends Model
{
    protected $fillable=['answer'];
    public $timestamps=true;

    /*
    |--------------------------------------------------------------------------
    |  Relationships
    |--------------------------------------------------------------------------
    |
    | The following section describe the relationships between the models
    | and other models out there in the wild, just kidding, the link
    | is with the Question model
    |
    */

    public function question(){
        return $this->belongsTo('App\Models\Question');
    }

}
