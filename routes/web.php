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

Route::get('/', function() {
  return view('welcome');
});
Route::get('home', 'PostsController@index');
Route::get('discover', 'ProfilesController@list');

Auth::routes();
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@callback');


Route::get('profile/{user}', 'ProfilesController@index')->name('profiles.show');
Route::get('profile/{user}/edit', 'ProfilesController@edit')->name('profiles.edit');
Route::patch('profile/{user}', 'ProfilesController@update')->name('profiles.update');

Route::get('post/create', 'PostsController@create');
Route::post('post', 'PostsController@store');
Route::get('post/{post}', 'PostsController@show');

route::post('follow/{user}', 'FollowsController@store');
