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
      $notification=$commended->status->owner->notification;
      $notifyObject=$notification->notification_object->where('object_name','commend')->first();
      $notifyObject->notification_changes->save([
        'verb'=>'commend',
        'actor'=>Auth::user()->id,
        'actionOn'=>$commeded->status->id
      ]);
    }
}
