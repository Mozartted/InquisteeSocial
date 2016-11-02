<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /*
     * A singe user may have several messages and can also send
     * several but each message belongs to a single sender and receiver
     * */

    protected $fillable=[
        'message',
        'sender',
        'receiver',
    ];

    public $timestamps=true;

    public function sender(){
        return $this->belongsTo('App\Models\User','sender');
    }

    public function recipient(){
        return $this->belongsTo('App\Models\User','receiver');
    }


}
