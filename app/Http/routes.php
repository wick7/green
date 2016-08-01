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
| Application Routes
|--------------------------------------------------------------------------
|
*/

    //Home
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    //Volunteer Registration Routes...
    Route::get('/volunteer/register',  'VolunteerAuth\AuthController@showRegistrationForm');
    Route::post('/volunteer/register', 'VolunteerAuth\AuthController@postRegister');

    //Volunteer Login Routes...
    Route::get('/volunteer/login', 'VolunteerAuth\AuthController@showLoginForm');
    Route::post('/volunteer/login','VolunteerAuth\AuthController@login');

    //Organization Registration Routes...
    Route::get('/organization/register',  'OrganizationAuth\AuthController@showRegistrationForm');
    Route::post('/organization/register', 'OrganizationAuth\AuthController@postRegister');

    //Organization Login Routes...
    Route::get('/organization/login', 'OrganizationAuth\AuthController@showLoginForm');
    Route::post('/organization/login','OrganizationAuth\AuthController@login');
    //guest view routes.
    Route::get('/calendarevents/show/{id}', ['as'=>'calendarevents.show', 
                                             'uses'=>'CalendarEventController@guestshow']);
    Route::get('/calendarevents/index', ['as'=>'Calender.index',
                                         'uses'=>'CalendarEventController@guestindex']
    );
        

/*
|--------------------------------------------------------------------------
| Volunteer Middlewear Routes 
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => ['volunteer']], function () {
    
    //Volunteer Logout Route...
    Route::get('/volunteer/logout', [
        'uses' => 'VolunteerAuth\AuthController@logout',
        'as' => 'volunteer.logout',
    ]);

    //Volunteer Dashboard Routes...
    //Route::get('/volunteer/dashboard', 'VolunteerController@getdashboard');
    Route::get('/volunteer/dashboard', [
        'uses' => 'VolunteerController@getdashboard',
        'as' => 'volunteer.dashboard',
    ]);

    Route::get('/volunteer/account', [
        'uses' => 'VolunteerController@getAccount',
        'as' => 'volunteer.account.save',
    ]);

    Route::post('/volunteer/account', [
        'uses' => 'VolunteerController@postAccount',
        'as' => 'volunteer.account',
    ]);

    Route::get('/volunteer/userImage/{filename}', [
        'uses' => 'VolunteerController@getUserImage',
        'as' => 'volunteer.account.image'
    ]);

    Route::get('/calendarevents/register/{id}', [
        'as'=>'calendar_events.register',
        'uses'=>'VolunteerController@getEventRegister'
    ]);
    Route::post('/{name}/{id}/photos', [
        'uses'=>'VolunteerController@addPhoto'
        ]);
});

Route::group(['middleware' => ['organization']], function () {
    //Organization logout Route...
    Route::get('/organization/logout', [
        'uses' => 'OrganizationAuth\AuthController@logout',
        'as' => 'organization.logout',
    ]);

    //Organization Dashboard Routes...
    //Route::get('/organization/dashboard', 'OrganizationController@getdashboard');
    Route::get('/organization/dashboard', [
        'uses' => 'OrganizationController@getdashboard',
        'as' => 'organization.dashboard',
    ]);

    Route::get('/organization/account', [
        'uses' => 'OrganizationController@getAccount',
        'as' => 'organization.account',
    ]);

    Route::post('/organization/account', [
        'uses' => 'OrganizationController@postAccount',
        'as' => 'organization.account',
    ]);

    Route::get('/organization/userImage/{filename}', [
        'uses' => 'OrganizationController@getUserImage',
        'as' => 'organization.account.image'
    ]);

        /*
    |--------------------------------------------------------------------------
    | Calender Routes  
    |--------------------------------------------------------------------------
    */
    Route::resource('calendar_events', 'CalendarEventController');
    Route::get('/calendar', ['uses' => 'SampleController@calendar']);

});






