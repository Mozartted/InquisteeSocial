<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 11/2/16
 * Time: 3:45 PM
 */

namespace app\Repositories\Status;
use App\Models\Commend;
use App\Models\User;
use App\Models\Status;
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

class EloquentStatusRepository implements StatusRepository
{
    private $user;


    public function __construct(User $user){
        $this->user=$user;
    }

    public function getStatusAndCommendsLeaderUser(User $user)
    {
        // TODO: Implement getStatusAndCommendsLeaderUser() method.
        // gets the status and commends of a particular user and his
        // leaders ordered according to timestamps.
        $leaderUserIds=$user->leaders->pluck('leaders');
        $leaderUserIds[]=$user->id;
        $CommendsCollection=Commend::whereIn('user_id',$leaderUserIds);
        $statusIdFromCommends=$CommendsCollection->pluck('status_id');
        $StatusCollection=Status::whereIn('user_id',$leaderUserIds)->union(Status::whereIn('status_id',$statusIdFromCommends))->latest()->take(10);


        return [
            'Commends'=>$CommendsCollection,
            'Status'=>$StatusCollection,
        ];
    }

    public function getStatusAndCommendsUser(User $user)
    {
        // TODO: Implement getStatusAndCommendsUser() method.
        $UserIds=$user->id;
        $CommendsCollection=Commend::whereIn('user_id',$UserIds);
        $statusIdFromCommends=$CommendsCollection->pluck('status_id');
        $StatusCollection=Status::whereIn('user_id',$UserIds)->union(Status::whereIn('status_id',$statusIdFromCommends))->latest()->take(10);

        return [
          'status'=>$StatusCollection,
            'commends'=>$CommendsCollection
        ];
    }


}