<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function accountUpdate(){
        $user=Auth::user();

        if(isset($request)){
            if(!empty($request->username)){
                $user->username=$request->username;
                $user->save;
            }


            if(!empty($request->email)){
                $user->email=$request->email;
            }

            if(!empty($request->password)){
                $user->password=$request->password;
            }

            $user->save();
        }

        $success="Account successfully updated";

        return response()->json($success);

    }

    public function deactivate(){
        $user=Auth::user();

        $user->activestatus=false;

        Auth::logout();
        return redirect()->route('registration_path');
    }
}
