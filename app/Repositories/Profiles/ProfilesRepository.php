<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 11/4/16
 * Time: 11:13 PM
 */

namespace App\Repositories\Profiles;
use App\Models\User;
use Illuminate\Http\Request;

interface ProfilesRepository
{
    public function searchProfilesAll(Request $request);
    public function getUserProfile(User $user);
}