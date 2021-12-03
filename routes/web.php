<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group (function(){

  Route::resource('groups', 'GroupController');
  Route::get('/groups/new', 'GroupController@newGroup')->name('new_group');
  Route::post('/groups/new', 'GroupController@newGroup')->name('create_group');
  Route::get('/groups/{group_id}', 'GroupController@show')->name('show_group');
  Route::post('/groups/{group_id}', 'GroupController@modify')->name('update_group');
  Route::get('export', 'GroupController@export');

});

Route::get('/groups', 'GroupController@index')->name('groups');
Route::get('/', 'ContentsController@home')->name('home');


Route::get('generate/password', function(){return bcrypt('123456789');});

Auth::routes();


/*
this socialite routes
/redirect/{facebook , gmail , github ...} this route is to open provider services
/callback/{facebook , gmail , github ...} this route will back from provider service

*/
Route::get ( '/redirect/{service}', 'Auth\LoginController@redirectToProvider' );
Route::get ( '/callback/{service}', 'Auth\LoginController@handleProviderCallback' );


// route eventlist facebook
Route::group(['middleware' => [
  'auth'
]], function(){
  Route::get('/eventlist', 'GraphController@retrieveUserProfile')->name('events');
});

Route::get('/home', 'HomeController@index')->name('home');
