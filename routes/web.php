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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'] ,function() {

    Route::get('/users', 'HomeController@showUsers');
    Route::get('/user/followinglist', 'UserController@showFollowing');
    Route::get('/user/followerslist', 'UserController@showFollowers');
    Route::get('/user/follow/{id}', 'UserController@follow');
    Route::get('/user/unfollow/{id}', 'UserController@unfollow');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/storeEdit/{id}', 'UserController@editStore');
    Route::get('/user/profile/{id}', 'HomeController@showUser');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/store', 'HomeController@store')->name('store');
    Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
    Route::post('/delete/{id}', 'HomeController@delete')->name('delete');
    Route::post('/storeEdit/{id}', 'HomeController@editStore')->name('edit');

});

