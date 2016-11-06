<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Registration Routes
|--------------------------------------------------------------------------
|
| These routes provide are for the registration_path for a new user
|
*/
Route::get('/',['as'=>'registration_path','uses'=>'RegistrationController@create']);
Route::post('/',['as'=>'registration_path','uses'=>'RegistrationController@store']);


/*
|--------------------------------------------------------------------------
| Session Routes
|--------------------------------------------------------------------------
| These routes deal with sessions basically logins and logouts with
| using session controller
|
*/
Route::get('login',['as'=>'login_path','uses'=>'SessionController@store']);
Route::delete('logout',['as'=>'login_path','uses'=>'SessionController@destroy']);

/*
|--------------------------------------------------------------------------
| Status Feeds Routes
|--------------------------------------------------------------------------
|
| These routes respond to the status feeds of the application and basically the
| status, using Route groups prefixed with the namespace "home" in the url.
| the last route in the group is a response to ajax or angualar calls
| to more views paginated.
|
*/
Route::group(['prefix'=>'home','middleware'=>'auth'],function(){
    Route::get('/',['as'=>'feeds_path','uses'=>'StatusFeedController@index']);
    Route::put('/',['as'=>'feeds_path','uses'=>'StatusFeedController@store']);
    Route::get('/more', ['as' => 'feeds_path_more', 'uses' => 'StatusFeedController@more']);
});

/*
|--------------------------------------------------------------------------
|  Settings Routes
|--------------------------------------------------------------------------
|
| You guessed right routes in this section would deal with settings
| some route here possibly returning JSON objects in response
|
*/
Route::group(['prefix'=>'settings','middleware'=>'auth'],function(){
    Route::get('/',['as'=>'settings_path','uses'=>'SettingsController@view']);
    Route::put('/account',['as'=>'settings_path_account','uses'=>'SettingsController@accountUpdate']);
    Route::put('/notifications',['as'=>'settings_path_notification','uses'=>'SettingsController@NotificationUpdate']);
    Route::put('/emails',['as'=>'settings_path_emails','uses'=>'SettingsController@EmailNotificationUpdate']);
    Route::put('/account/deactivation',['as'=>'settings_path_deactivation','uses'=>'SettingsController@deactivation']);


});

/*
|--------------------------------------------------------------------------
| Message View
|--------------------------------------------------------------------------
|
| Doing stuff in with messages that does not use JSON response
|
*/
Route::get('/message',['as'=>'message_path','middleware'=>'auth','uses'=>'MessageController@index']);

/*
|--------------------------------------------------------------------------
| Notifications View
|--------------------------------------------------------------------------
|
| Returning notifications views
|
*/
Route::get('/notifications',['as'=>'notifications_path','middleware'=>'auth','uses'=>'NotificationsController@view']);

/*
|--------------------------------------------------------------------------
| Search Routes
|--------------------------------------------------------------------------
|
| This is the search route for the application the JSON search route is
| in the Route group prefixed ajax.
|
*/
Route::get('/search',['as'=>'search_path','middleware'=>'auth','uses'=>'SearchController@index']);

/*
|--------------------------------------------------------------------------
| Ajax Stuff
|--------------------------------------------------------------------------
|
| All the Cool Ajax stuff starts here, so lets begin
|
*/
Route::group(['prefix'=>'ajax','middleware'=>'auth'], function(){
    /*
    |--------------------------------------------------------------------------
    | Like Operations Routes (JSON Response)
    |--------------------------------------------------------------------------
    |
    | Doing stuff like liking a post, this is returns an JSON response
    | using a common namespace for all Ajax Operations, json response
    |
    */
    Route::put('/love/{status}',['as'=>'love_path','uses'=>'StatusFeedController@love']);
    Route::put('/message/',['as'=>'message_path','uses'=>'MessageController@create']);

    /*
    |--------------------------------------------------------------------------
    | Like Operations Routes (JSON Response)
    |--------------------------------------------------------------------------
    |
    | Doing stuff like voting a post, this is returns an JSON response
    | using a common prefix for all Ajax Operations, json response
    |
    */
    Route::put('/vote/{status}',['as'=>'vote_path','uses'=>'VoteController@create']);

    //this section is a json response route for the commend functionality
    Route::put('/commend/{status}',['as'=>'commend','uses'=>'StatusFeedController@commend']);

    /*
    |--------------------------------------------------------------------------
    | Search (JSON Response)
    |--------------------------------------------------------------------------
    |
    | Performs the search request and responds in JSON
    |
    */
    Route::post('/search/',['as'=>'search_path','uses'=>'SearchController@search']);

    /*
    |--------------------------------------------------------------------------
    | Questions (JSON Response)
    |--------------------------------------------------------------------------
    |
    | answering the question, never been easier.
    |
    */
    Route::post('/question/{question}',['as'=>'question_answer','uses'=>'QuestionController@answering']);

});

/*
|--------------------------------------------------------------------------
| User Profile and Edits Routes
|--------------------------------------------------------------------------
|
| These routes respond to profile views and editing the kid stuff
| note for a social networking platform, if the url points to
| a username, the user's profile would have to be loaded.
| in attempt to get working routes, this section sho-
| uld be declared at the very end of the routes
|
*/
Route::get('/{user}',['as'=>'user_profile_path','middleware'=>'auth','uses'=>'UserController@show']);
Route::get('/{user}/edit',['as'=>'user_profile_edit','middleware'=>'auth','uses'=>'UserController@edit']);
Route::put('/{user}/edit',['as'=>'user_profile_edit','middleware'=>'auth','uses'=>'UserController@update']);
