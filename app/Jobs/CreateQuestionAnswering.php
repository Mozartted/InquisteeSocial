<?php

namespace App\Jobs;

use App\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateQuestionAnswering implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $answer,$subject;


    public function __construct(Request $request)
    {
        //this job basically answers the questions given to a particular user
        //let the coding begin. at the en
        $this->answer=$request->answer;
        $this->subject=$request->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $question=new Question(['user_id'=>Auth::user()->id,'subject'=>$this->subject,'answer_type_id'=>$this->answer]);
        $question->save;
        //event(new QuestionAnswered($question));
    }
}
