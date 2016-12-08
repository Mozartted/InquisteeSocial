<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Interest
 * @package App\Models
 * could not really find another word to use
 * for the person showing interest and the
 * person on whom interest is shown
 */

class Interest extends Model
{
    protected $fillable=[
        'subject',
        'shower'
    ];

    public $timestamps=true;



    public function shower(){
        return $this->belongsTo('App\Models\User','shower');
    }

    public function subject(){
        return $this->belongsTo('App\Models\User','subject');
    }
}
