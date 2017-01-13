<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Commend;

class CreateStatusNotification implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $commended;
    /**
    * Create a new job instance.
    * This job instance is meant to create
    * the commends notification
    * @return void
     */
    public function __construct(Commend $commended)
    {
        $this->commended=$commended;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      //get notification belonging to user, if non-existent, create one
      $notification=$this->commended->status->owner->notification;
      if(!$notification){
        //if non-exixstent
        $stuff=new Notification(['user_id'=>$this->commended->status->owner->id]);
        $stuff->save();
        $notification=$commended->status->owner->notification;

      }
      //get the notification's object corresponding to commend, if non-exixtent create one.
      $notifyObject = $notification->notification_object->where('object_name','commend')->first();
      if(!$notifyObject){
        $notificationObject=new \App\Models\Notification_object(['object_name'=>'commend']);
        $notification->notification_object()->saveMany([$notificationObject]);
        $notifyObject =$notification->notification_object->where('object_name','commend')->first();

      }
      
      $notifyChange=new Notification_change( [
          'verb' => 'commended',
          'actor' => Auth::user()->id,
          'actionOn' => $this->commended->status->id
      ]);

      $notifyObject->notification_changes()->saveMany([
        $notifyChange
      ]);
    }
}
