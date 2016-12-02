<?php

namespace App\Http\Controllers;
use App\Events\StatusCreated;
use Illuminate\Http\Request;
use App\Jobs\CreateStatusJob;
use App\Models\Love;
use App\Models\Notification_change;
use App\Repositories\Status\StatusCommendRepository;
use App\Models\Status;
use App\Models\Media;
use App\Models\Commend;
use App\Services\ProcessImage;
use Auth;

class StatusFeedController extends Controller
{


/*
|--------------------------------------------------------------------------
| StatusFeedController
|--------------------------------------------------------------------------
|
| Handles all shit related the the feeds related to the web which includes
| getting the feeds(index), storing a new feed(store), obtaining more
| feeds (more), and making commends(commend)
|
*/

    public function index(StatusCommendRepository $statusStuff){
        $statusThighs=$statusStuff->getStatusAndCommendsLeaderUser(Auth::user());
        $status=$statusThighs['Status'];
        $commends=$statusThighs['Commend'];
        return view('feed.index',[
            'status'=>$status,
            'commends'=>$commends
        ]);

    }

    public function store(Request $request){

        $status=new Status(
            [
                'status_text'=>$request->status_text,
            ]
        );

        Auth::user()->status()->save($status);

        $urlAndExtension=[];

        if($request->hasFile('image')){
            $file=$request->file('image');
            $media=new Media([
                'url'=>(new ProcessImage())->saveStatus($file,$path="images/status/"),
                'type'=>$request->image->extension()
            ]);

            Auth::user()->profile->media()->save($media);

            $urlAndExtension[$media->id]=['description'=>$media['url']];

        }else{
            return response()->json(false);
        }

        $status->media()->attach(
            $urlAndExtension
        );

        return response()->json(true);
    }

    public function more(Request $request, StatusCommendRepository $statusStuff ){
        $statusThings=$statusStuff->getStatusAndCommendsLeaderUserAjax(Auth::user(),$request->skipQty);
        return response()->json([
            'commend'=>$statusThings['Commends'],
            'status'=>$statusThings['Status'],
        ]);
    }

    public function commend(Request $request,Status $id){
        /*
        |----------------------------------------------------
        | Making a Commend
        |----------------------------------------------------
        | This methods make a commend by taking in id of the
        | Status and making a model of it, Instantiating a
        | the Status Model to have the Commend with the
        | user name and status id.
        |
        |----------------------------------------------------
        | Note: the commend action would fire a notification
        |       event that's going to be responded to by
        |       adding the notification to database.
        |
        */
        $id->commends()->create(
            [
                'commend'=>$request['commend'],
                'user_id'=>Auth::user()->id,
            ]
        );

        return response()->json(
            ['commend_count'=>count(Commend::where('status_id',$id->id))]
        );


    }

    public function love(Status $status){
        /*
        |----------------------------------------------------
        | Making a Commend
        |----------------------------------------------------
        | This methods make a commend by taking in id of the
        | Status and making a model of it, Instantiating a
        | the Status Model to have the Commend with the
        | user name and status id.
        |
        |----------------------------------------------------
        | Note: the commend action would fire a notification
        |       event that's going to be responded to by
        |       adding the notification to database.
        |
        */
        $status->loves()->create(
            [
                'user_id'=>Auth::user()->id,
                'status_id'=>$status->id,
            ]);

        $notification=$status->
        owner->
        notifications->
        notification_object('object_name','commend')->
        notification_change()->save(['']);

        //event(new StatusCreated($status))

        return response()->json(
            ['love_count'=>count(Love::where('status_id',$status->id)),
            'userLove'=>true,
            ]
        );


    }

    public function vote(Request $request,Status $status){
        //the vote type can be up vote or downvote...
        // vote get inputed based on type.
        // vote up is a one, vote down a zero..
        $status->votes->save(
            [
                'vote_type_id'=>$request->vote,
                'user_id'=>Auth::user()-id,
            ]
        );

        return response()->json([
           'count'=>$status->votes()->where('vote_type_id',$request->vote)
        ]);
    }
}
