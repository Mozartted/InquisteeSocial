<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
|
| This controller handles all activities with the user and his profile
|
*/

class UserController extends Controller
{

    public function show(ProfilesRepository $userrepository,User $user){
        $userProfiles=$userrepository::getUserProfile($user);
        return view('',['profile'=>$userProfiles]);
    }




}
