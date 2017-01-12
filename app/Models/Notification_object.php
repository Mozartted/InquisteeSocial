<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification_object extends Model
{
    protected $table='notification_objects';

    public $timestamps=false;
    protected $fillable=['notifications_id','object_name'];

    public function notification(){
        return $this->belongsTo('App\Models\Notification','notifications_id');
    }

    public function notification_changes(){
        return $this->hasMany('App\Models\Notification_change','notification_objects_id');
    }

}
