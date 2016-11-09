<?php

namespace App\Http\Controllers;

use App\Repositories\Profiles\ProfilesRepository;
use App\Models\Media;
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
        $userProfiles=$userrepository->getUserProfile($user);
        return view('',['profile'=>$userProfiles]);
    }


    //when user edits their profile view.
    public function edit(Request $request){
        //get the user id from the request and
        //check if the user to be edited is
        //currently authenticated

        //note if a user enter's a new profile pic
        //then we'll have to first insert the new
        //picture into the database and place it into
        //the the right folder in public.

        if(Auth::user()->id == $request->id){
            //perform the updating of the profile information
            $user=User::find($request->id);
            /*
            |----------------------------------------------
            | before we continue, what can user edit?
            |----------------------------------------------
            |
            | A user can edit the following.
            |  -Their user name
            |  -Their profile picture
            |  -Their description
            |  -Their firstname/lastname
            |  -their likes in any category
            |
            | hmm, I think that's all
            |
            */
            $profileUpdate=[];

            if(isset($request)){
                if(!empty($request->username)){
                    $user->username=$request->username;
                    $user->save;
                }

                if(!empty($request->file( 'profileimage'))){
                    $newUserProfileImagePath = $profileImagePath = App::make('ProcessImage')->execute($request->file('profileimage'), 'images/profileimages/', 180, 180);
                    $newProfilePic=new \Media(
                    [
                        'profiles_id'=>$user->profile->id,
                        'type'=>App::make('ProcessImage')->getExtension($request->file('profileimage')),
                        'url'=>$newUserProfileImagePath
                    ]);

                    $profileUpdate['profile_pic']=$newProfilePic->id;

                }

                if(!empty($request->about)){
                    $profileUpdate['about']=$request->about;
                }

                if(!empty($request->firstname)){
                    $profileUpdate['firstname']=$request->firstname;
                }

                if(!empty($request->lastname)){
                    $profileUpdate['lastname']=$request->lastname;
                }

                if(!empty($request->file('coverpic'))){
                    $newCoverPicImagePath = $profileImagePath = App::make('ProcessImage')->execute($request->file('coverpic'), 'images/coverpics/');
                    $newCoverPic=new \Media(
                    [
                        'profiles_id'=>$user->profile->id,
                        'type'=>App::make('ProcessImage')->getExtension($request->file('coverpic')),
                        'url'=>$newCoverPicImagePath
                    ]);

                    $newCoverPic->save;

                    $profileUpdate['cover_pic']=$newCoverPic->id;
                }


                $user->profile->save($profileUpdate);


            }

        }

    }


}
