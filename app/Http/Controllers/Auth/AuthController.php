<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Profile;
use Socialite;

class AuthController extends Controller
{
    //
    protected $redirectRegister = '/steps-register';
    protected $redirectTo='/';

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
        $user=Socialite::driver($provider)->user();
        $userArray = $this->findOrCreateUser($user, $provider);
        Auth::login($userArray['user'], true);

        if($userArray['status']=="existing"){
            return redirect($this->redirectTo);
        }else{
            return redirect($this->redirectRegister);
        }

    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return [
                    'user'=>$authUser,
                    'status'=>"existing"
                ];
        }else{
            $authUser=User::where('email',$user->email)->first();
            if ($authUser){
                return [
                        'user'=>$authUser,
                        'status'=>"existing"
                    ];
            }
        }

        $parts = explode(" ", $user->name);

        $lastname=array_pop($parts);
        $firstname=implode(" ",$parts);

        $userCreated=User::create([
            'username'     => $firstname.$lastname,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);

        $proflie=new \App\Models\Profile([
            'first_name'=>$firstname,
            'last_name'=>$lastname,
        ]);

        $userCreated->profile()->save($proflie);

        return [
                'user'=>$userCreated,
                'status'=>"new"
            ];
    }
}
