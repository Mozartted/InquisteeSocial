<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 11/6/16
 * Time: 6:51 AM
 */

namespace App\Repositories\Messages;

use App\Models\Message;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;


class EloquentMessageRepository implements MessageRepository
{
    public function getMessagesForUser(){
        //getting al messages where the user
        //is the responder and also the sender
        $AllMessages=Message::where('sender','=',Auth::user()->id)->orWhere('receiver','=',Auth::user()->id);

        //rearrange the messages by the other user's names
        //first collect the current user's name of the other,
        //store it in an array, iterate over the messages
        //and obtain all where the user is the sender or
        //receiver

        $messageResponder=[];
        $messageCollection=[];

        foreach($AllMessages as $message){

            $idHolder=null;
            if($message->sender!=Auth::user()->id){
                $idHolder=$message->sender;
            }else if($message->receiver !=Auth::user()->id){
                $idHolder=$message->receiver;
            }
            if(!in_array($idHolder,$messageResponder)){
                //the next step is to obtain the messages
                //from the collection where the sender or
                //the receiver is the other person. ie the
                //idHolder
                $messagesUser=$AllMessages->where('sender','=',$idHolder)->orWhere('receiver','=',$idHolder)->orderBy('created_at', 'desc');
                $messageCollection[]=[
                    'responder'=>$idHolder,
                    'messages'=>$messagesUser,
                    'messageCount'=>count($messagesUser->where('sender','=',Auth::user()->id))
                ];

                $MessageResponder[]=$idHolder;
            }
        }

        return $messageCollection;
    }

    public function getMessagesForParticularResponder(User $responder){
        //get all messages where this user is either the sender or the receiver
        $AllMessages=Message::where('sender','=',Auth::user()->id)->orWhere('receiver','=',Auth::user()->id);
        $messagesUser=$AllMessages->where('sender','=',$idHolder)->orWhere('receiver','=',$idHolder)->orderBy('created_at', 'desc');

        return $messagesUser;

    }

}
