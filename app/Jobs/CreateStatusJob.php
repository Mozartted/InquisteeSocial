<?php

namespace App\Jobs;

use App\Services\ProcessImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;
use Illuminate\Http\Request;

class CreateStatusJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $User;
    protected $status_text;
    protected $imageUploaded;


    public function __construct(Request $request)
    {
        $this->User=Auth::user();
        $this->status_text=$request->status_text;
        $this->imageUploaded=$request->file('image');

        // looping though all of the images up loaded,
        // i'd have to save each to a database and
        // store their new name in an array.
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $status=new Status(
            [
                'user_id'=>$this->User,
                'status_text'=>$this->status_text,
            ]
        );

        $urlAndExtension=array();

        foreach($this->imageUploaded as $upload){
            $urlAndExtension[]=[
                'profile_id'=>$this->User->profile->id,
                'url'=>(new ProcessImage())->saveStatus($upload,$path="images/status/"),
                'type'=>(new ProcessImage())->getExtension($upload)
            ];
        }

        $status->save();

        $status->media()->saveMany(
            $urlAndExtension
        );
    }
}
