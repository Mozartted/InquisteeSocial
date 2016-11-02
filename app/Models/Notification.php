<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table='notifications';

    public $timestamps=true;
    protected $fillable=['user_id'];

    public function owner(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function notification_object(){
        return $this->hasMany('App\Models\Notification_object','notifications_id');
    }

    public function notification_changes(){
        return $this->hasManyThrough(
            'App\Models\Notifications_change','App\Models\Notifications_object',
            'notifications_id','notification_objects_id','id'
        );
    }


}
