<?php

namespace App\Http\Controllers;

use App\Jobs\CreateQuestionAnswering;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //handles questions and generated questions for a certain user_id
    public function answering(Request $req){
        //answering the question pertaining to a user_id
        dispatch(new CreateQuestionAnswering($req));

        return response()->json(true);
    }
}
