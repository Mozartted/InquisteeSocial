<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Jobs\CreateUserJob;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Registration Controller
|--------------------------------------------------------------------------
|
| Handles all operation associated with the Registration Routes
| the store method creates a new user, using a job to handle
| the registration, during the job registration, a mail
| to the user's mail in another job to confirm their
| user status.
|
| The RegistrationController has two methods index method and
| store method, store takes in new user and register's them
| index get the view of the application.
|
*/

class RegistrationController extends Controller
{
    public function index(){
        return view('registration.index');
    }

    public function store(RegisterUserRequest $request){

        $newUserProfileImagePath = $profileImagePath = App::make('ProcessImage')->execute($request->file('profileimage'), 'images/profileimages/', 180, 180);

        $newUserBirthday = Carbon::createFromDate($request->year, $request->month, $request->day);

        //registering a new user
        $newUser=$this->dispatch(new CreateUserJob($request->all() + [
                'birthday'=> $newUserBirthday,
                'profileImagePath'=> $newUserProfileImagePath,
            ]));


        return redirect()->route('feeds_path');

    }
}
