<?php

/*
|--------------------------------------------------------------
| Notification Changes
|--------------------------------------------------------------
| Every notification change belongs to a single notification
| object.
|
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification_change extends Model
{
  protected $table='notification_changes';
  protected $fillable=['notification_objects_id','verb','actor','actionOn'];

  public function actor(){
    return $this->belongsTo('App\Models\User','actor');
  }

  public function actionOn($model){
      return $this->belongsTo($model,'actionOn');
  }

}
