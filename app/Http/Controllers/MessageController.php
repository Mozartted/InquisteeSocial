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
        $AllMessages=$messageRepository->getMessagesForUser();

        return view('',['allMessagesAndInfo',$AllMessages]);

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
