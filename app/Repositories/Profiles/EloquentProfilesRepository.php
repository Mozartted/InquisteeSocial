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
            ['first_name','=',$request->search],
            ['first_name','like','%' .$request->search.'%']
        ];

        $whereLastNameIsLikeParameter=[
            ['last_name','=',$request->search],
            ['last_name','like','%' .$request->search.'%']
        ];

        $whereUserNameisLikeParameter=[
            ['username','=',$request->search],
            ['username','like','%' .$request->search.'%']
        ];
        $users=Profile::where($whereFirstNameIsLikeParameter)
            ->union(Profile::where($whereLastNameIsLikeParameter))
            ->union(Profile::where('user_id',User::where($whereUserNameisLikeParameter)->get()->pluck('id')))
            ->get();

        return $users;
    }

    public function getUserProfile(User $user){
        //get all information including likes for a current user
        //to facilitate the usage of the json form, we return the
        //data in an array.
        $profile=$user->profile;
        $userInfo=[
            'id'=>$user->id,
            'username'=>$user->username,
            'firstname'=>$profile->first_name,
            'lastname'=>$profile->last_name,
            'birthday'=>$profile->birthday,
            'likes_movies'=>$profile->like,
            'gender'=>$profile->gender,
            'cover_pic'=>$profile->cover_pic,
            'profile_pic'=>$profile->profileMedia,
            'about'=>$profile->about,
            'joined'=>$profile->created_at,
        ];


        return $userInfo;
    }

}
