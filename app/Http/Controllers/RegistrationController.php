<?php

namespace App\Http\Controllers;

use App\Services\ProcessImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use App\Jobs\CreateUserJob;
use Carbon\Carbon;
use App\Models\Media;
use App\Models\School;
use Auth;


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

        if(Auth::check()){

        }

        //$newUserProfileImagePath = $profileImagePath = App::make('ProcessImage')->execute($request->file('profileimage'), 'images/profileimages/', 180, 180);
        $newUserBirthday =Carbon::createFromDate($request->year, $request->month, $request->day);
        //registering a new user

        /*
        $this->dispatch(new CreateUserJob($request->all() + [
                'birthday'=> $newUserBirthday,                //'profileImagePath'=> $newUserProfileImagePath,
            ]
        ));
         *
         */

        $user =new User([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        $user->save();

        $profile=new \App\Models\Profile(
            ['birthday'=>$newUserBirthday,
                'first_name'=>$request->firstname,
                'last_name'=>$request->lastname,
                'gender'=>$request->gender,
            ]
        );

        $user->profile()->save($profile);

        Auth::login($user);

        return redirect()->route('register-steps');


    }

    public function steps(){
        return view('registration.regsteps',['no_app'=>true]);
    }

    public function pic(Request $req){
        if($req->ajax()){
            $data=$req->image;

            $profileUrl=(new ProcessImage())->saveProfileAjax($data, 'images/profileimages/');

            $media=new Media([
                'type'=>'png',
                'url'=>$profileUrl
            ]);

            Auth::user()->profile->media()->save($media);

            if(Auth::user()->profile->profileMedia()->associate($media)){
                Auth::user()->profile->save();
                return response()->json(
                    ['message'=>"completed click next to move to the next step"]
                );
            }
            else {
                return response()->json(['message'=>'not uploaded']);
            }

        }


    }

    public function details(Request $req){
        $profile=Auth::user()->profile;

        $Admission =Carbon::createFromDate($req->admission['admissionyear'], $req->admission['admissionmonth'], $req->admission['admissionday']);
        $Graduation =Carbon::createFromDate($req['graduationyear'], $req->graduation['graduationmonth'], $req->graduation['graduationday']);

        $aDandGrad=[];
        if($profile){
            $profile->about=$req->about;
            $school=School::where('name',$req->school)->first();
            if(isset($school)){//checking if the school exist, if true

              if(!isset(($profile->schools->where('school_id',$school->id)->first())->id)){
                //checking if the school is already attached to the curent user
                $aDandGrad[$school->id]=['admission'=>$Admission,'graduation'=>$Graduation];

                $profile->schools()->attach($aDandGrad);

                $profile->save();

                return response()->json(
                    ['message'=>'Profile Created completed click complete to enter home']
                );

              }else{
                $aDandGrad=['admission'=>$Admission,'graduation'=>$Graduation];

                $profile->schools()->updateExistingPivot(
                    $school->id,
                    $aDandGrad
                  );

                  $profile->save();

                  return response()->json(
                      ['message'=>'Profile Updated completed click complete to enter home']
                  );
              }




            }else{
              $school=new School([
                'name'=>$req->school,
              ]);

              $school->save();

              $aDandGrad[$school->id]=['admission'=>$Admission,'graduation'=>$Graduation];

              $profile->schools()->attach(
                  $aDandGrad
              );

              $profile->save();

              return response()->json(
                  ['message'=>'Profile Created completed click complete to enter home']
              );
            }

        }else {
            return response()->json(
                ['message'=> 'Profile Couldn\'nt be updated']
            );
        }

    }


    //controller for cover picture setup
    public function coverpic(Request $req){
      if($req->ajax()){
          $data=$req->image;

          $profileUrl=(new ProcessImage())->saveCoverAjax($data, 'images/cover/');

          $media=new Media([
              'type'=>'png',
              'url'=>$profileUrl
          ]);

          Auth::user()->profile->media()->save($media);

          if(Auth::user()->profile->coverPic()->associate($media)){
              Auth::user()->profile->save();
              return response()->json(
                  ['message'=>"completed click next to move to the next step"]
              );
          }
          else {
              return response()->json(['message'=>'not uploaded']);
          }

      }

    }
    // public function descriptions(Request $request){
    //   $profile=Auth::user()-profile;
    //
    //   if($profile){
    //
    //   }
    // }
}
