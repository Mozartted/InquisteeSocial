<?php

namespace App\Http\Controllers;
use App\Repositories\Profiles\ProfilesRepository;
use App\Repositories\Status\StatusCommendRepository;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    //performs a search on user's profiles and status tables
    //would operate in a repository
    //this section handles Search's against all bool shit.
    //and returns a json array of them all.
    public function searchSomething(Request $request,ProfilesRepository $profilesRepository,StatusCommendRepository $statusCommendRepository){
        //perform search using the reposities
        $profileSearched=$profilesRepository->searchProfilesAll($request);
        $statusSearched=$statusCommendRepository->searchStatusAll($request);


        // response()->json([
            //'profilesSearched'=>$profileSearched,
            // 'statusSearched'=>$statusSearched
        // ]);
        return view('search.index',['profile'=>$profileSearched,'status'=>$statusSearched]);
    }

    public function index(){
        return view('search.index');
    }

    public function search(Request $request,ProfilesRepository $profilesRepository){
        //perform search using the reposities
        $profileSearched=$profilesRepository->searchProfilesAll($request->search);

        return response()->json([
            'profilesSearched'=>$profileSearched,
        ]);
    }

}
