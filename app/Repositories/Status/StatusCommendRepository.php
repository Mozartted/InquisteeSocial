<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 11/2/16
 * Time: 3:43 PM
 */

namespace App\Repositories\Status;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| The Status Repository
|--------------------------------------------------------------------------
|
| This Eloquent status repository would implement methods to retrieve all
| status and commends of a user and his leaders, in his feeds panel,
| also retrieves a users own feeds and commends alone, and also
| obtaining a single status by its ID with the no of likes
| and Votes, also posting a status and commending a status
|
*/

interface StatusCommendRepository
{
    public function getStatusAndCommendsLeaderUser(User $id);
    public function getStatusAndCommendsUser(User $user);
    public function getStatusAndCommendsLeaderUserAjax(User $id,$skipQty);
    public function searchStatusAll(Request $request);

}