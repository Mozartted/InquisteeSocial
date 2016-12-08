<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification_object extends Model
{
    protected $table='notification_objects';

    public $timestamps=true;
    protected $fillable=['notifications_id'];


    public function notification_changes(){
        return $this->hasMany('App\Models\Notification_change','notification_objects_id');
    }

}
