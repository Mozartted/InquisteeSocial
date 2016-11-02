<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Love extends Model
{
    /**
     * A single user can love many status
     * and these status can have may loves
     * from different individuals, thus a
     * many to many relationship between
     * users through love
     ***/

    protected $table='loves';

    protected $fillable=['status_id','user_id'];
    public $timestamps=true;

    public function status(){
        return $this->belongsTo('App\Models\Status','status_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','users_id');
    }


}
