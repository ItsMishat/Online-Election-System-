<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

//////////////////Welcomedefault///////////////
Route::get('/', function () {
    return view('welcome');
});
//////////////////HomeSweetHome///////////////
Route::get('home', function () {
    return view('home');
});
/////////////////Profileroutes///////////////////////////
Route::get('profile', ['uses'=>'ProfileController@profile']);
Route::post('profile', ['uses'=>'ProfileController@update']);

//////////////////WelcomeController///////////////
Route::get('welcome',['uses'=>'WelcomeController@welcome']);
 
//////////////////UsersController///////////////

Route::get('create', ['uses'=>'UsersController@create']);
Route::post ('users/ucreate', ['uses' => 'UsersController@store']);
Route:: get('users/uview',['uses' =>'UsersController@uview']);

/////////////////FormController///////////////////////
Route::get('cform',['uses' => 'CformController@cform']);
//Route::post('cform',['uses' => 'CformController@store']);
Route::post('cform', ['uses'=> 'CformController@upload']);

//////////////Nomination for President/////////////
Route::get('cform/cpview',['uses' => 'cviewcontroller@cpview']);
Route::post('/cform/cpview',['uses' => 'Candidatescontroller@store']);

//////////////Nomination for Vice-President/////////////////
Route::get('cform/cvpview',['uses' => 'cviewcontroller@cvpview']);
Route::post('cform/cvpview',['uses' => 'Candidatescontroller@store']);

//////////////////sorry//////////////////////////////
Route::get('supreme', ['uses' => 'SupremeController@Supreme']);
Route::get('sorry', ['uses'=>'SorryController@sorry']);

///////////////for election panel////////////////////////////////////Vote//////////////////
Route::get('/election/epanel', ['uses' => 'EpanelController@epanel']);
Route::post('/election/epanel', ['uses' => 'EpanelController@election']);

//////////////For guest messages////////////
Route::post('/welcome', ['uses' => 'g_messageController@message']);
Route::get('/users/g_messages', ['uses' => 'g_messageController@g_message']);
//////////For vote//////////
Route:: get('/election/vote_p', ['uses' => 'VoteController@vote_p']);
Route:: get('/election/vote_vp', ['uses' => 'VoteController@vote_vp']);
Route::post('/election/vote_p', ['uses' => 'VoteController@S_votes']);
Route::post('/election/vote_vp', ['uses' => 'VoteController@S_votes']);

////////////////For Results//////////////////////////
Route::get('results', ['uses' => 'ResultCOntroller@result']);