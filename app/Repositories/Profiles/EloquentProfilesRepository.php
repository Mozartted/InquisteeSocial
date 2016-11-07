<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 11/4/16
 * Time: 11:14 PM
 */

namespace App\Repositories\Profiles;


use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;

class EloquentProfilesRepository implements ProfilesRepository
{
    public function searchProfilesAll(Request $request)
    {
        //searching all Profiles with parameter Pattern Returing all result
        $whereFirstNameIsLikeParameter=[
            ['first_name','=',$request->data],
            ['first_name','like','%' .$request->data.'%']
        ];

        $whereLastNameIsLikeParameter=[
            ['last_name','=',$request->data],
            ['last_name','like','%' .$request->data.'%']
        ];

        $whereUserNameisLikeParameter=[
            ['username','=',$request->data],
            ['username','like','%' .$request->data.'%']
        ];
        $users=Profile::where($whereFirstNameIsLikeParameter)
            ->where($whereLastNameIsLikeParameter)
            ->Where('user_id',User::where($whereUserNameisLikeParameter)->list('id'))
            ->get();

        return $users;
    }

    public function getUserProfile(User $id){
        //get all information including likes for a current user
        //to facilitate the usage of the json form, we return the
        //data in an array.
        $user=$id->profile;
        $userInfo=[
            'id'=>$id->id,
            'username'=>$id->username,
            'firstname'=>$user->firstname,
            'lastname'=>$user->lastname,
            'birthday'=>$user->birthday,
            'likes_movies'=>$user->like,
            'gender'=>$user->gender,
            'cover_pic'=>$user->cover_pic,
            'profile_pic'=>$user->profilePic,
            'about'=>$user->about,
            'joined'=>$user->created_at,
        ];


        return $userInfo;
    }

}
