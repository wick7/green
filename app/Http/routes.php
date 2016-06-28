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


/*
|--------------------------------------------------------------------------
| Volunteer Middlewear Routes 
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => ['volunteer']], function () {
    
    //Volunteer Logout Route...
    Route::get('/volunteer/logout','VolunteerAuth\AuthController@logout');

    //Volunteer Dashboard Routes...
    //Route::get('/volunteer/dashboard', 'VolunteerController@getdashboard');
    Route::get('/volunteer/dashboard', [
        'uses' => 'VolunteerController@getdashboard',
        'as' => 'volunteer.dashboard',
    ]);
});

Route::group(['middleware' => ['organization']], function () {
    //Organization logout Route...
    Route::get('/organization/logout','OrganizationAuth\AuthController@logout');

    //Organization Dashboard Routes...
    //Route::get('/organization/dashboard', 'OrganizationController@getdashboard');
    Route::get('/organization/dashboard', [
        'uses' => 'OrganizationController@getdashboard',
        'as' => 'organization.dashboard',
    ]);

        /*
    |--------------------------------------------------------------------------
    | Calender Routes  
    |--------------------------------------------------------------------------
    */
    Route::resource('calendar_events', 'CalendarEventController');
    Route::get('/calendar', ['uses' => 'SampleController@calendar']);
});




