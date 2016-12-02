<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginUserRequest;
use Auth;


/*
|--------------------------------------------------------------------------
| Session Controller
|--------------------------------------------------------------------------
|
| Handles all activities related to user session login and logout.
| have fun....
|
*/

class SessionController extends Controller
{
    public function store(LoginUserRequest $request){
        /*
        |--------------------------------------------------------------------------
        | Login User
        |--------------------------------------------------------------------------
        |
        | Login user using the Auth Attempt option
        |
        */

        if(! Auth::attempt(['email' => $request->username, 'password' => $request->password])){
            if(! Auth::attempt(['username' => $request->username,'password'=> $request->password])){
                return redirect()->back()->with('error','we are unable to sign you in, check your credentials please');
            }else{
                $CurrentUser=Auth::user();
                return redirect()->route('feeds_path')->with('message','welcome '
                    .$CurrentUser->profile->first_name.
                    ', How are you?');
            }
        }else{
            $CurrentUser=Auth::user();
            return redirect()->route('feeds_path')->with('message','welcome '
                .$CurrentUser->profile->first_name.
                ', How are you?');
        }

    }

    public function destroy(){
        /*
        |--------------------------------------------------------------------------
        | Logout User
        |--------------------------------------------------------------------------
        |
        | This section does all the logout shit by destroying all sessions and
        | redirecting user to the registration view of the home page.
        |
        */
        Auth::logout();
        return  redirect()->guest('welcome');

    }

}
