<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Repositories\Messages\MessageRepository;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Message Controller
|-------------------------------------------------------------------------
|
| handles all activity relating to messaging
|
*/


class MessageController extends Controller
{
    public function index(MessageRepository $messageRepository){
        //retrieve all messages between a user
        //and those he's messaged with arranged in order
        $MessageCollection=$messageRepository->getMessagesForUser();
        // dd($MessageCollection);
        // dd($MessageCollection['mostRecentUser']);

        return view('messages.index',[
          'MessageCollection'=>$MessageCollection['messageCollection'],
          'recentUser'=>$MessageCollection['mostRecentUser'],
          'resentUser'=>$MessageCollection['mostResentUser']
        ]);

    }


    //the message function works as an Ajax function
    public function create(Request $request, User $user){
        //create new message filled to the user
        $message=Message::create([
            'message'=>$request->message,
            'sender'=>Auth::user()->id,
            'receiver'=>$user->id,
        ]);

        return response()->json($message);

    }

}
