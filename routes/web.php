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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home'
]);

Route::get('/register', [
	'uses' => 'AuthController@getRegister',
	'as' => 'auth.register',
	'middleware' => ['guest']
]);

Route::post('/register', [
	'uses' => 'AuthController@Register',
	'as' => 'auth.postRegister',
	'middleware' => ['guest'],
]);


Route::post('/signIn', [
	'uses' => 'AuthController@signIn',
	'as' => 'auth.signIn'
]);


Route::get('/logout', [
	'uses' => 'AuthController@logout',
	'as' => 'logout'
]);


Route::get('/store/{user_id}', [
	'uses' => 'StoreController@index',
	'as' => 'store.index'
]);


Route::get('/admin', [
	'uses' => 'StoreController@admin',
	'as' => 'store.admin'
]);


Route::get('/tags', [
	'uses' => 'TagController@index',
	'as' => 'tags.index'
]);

/*Tags route*/

Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Route::resource('states', 'StateController', ['except' => ['create']]);


Route::get('/store/profile/{userId}', [
	'uses' => 'ProfileController@index',
	'as' => 'profile.index'
]);

Route::post('/profile/edit', [
	'uses' => 'ProfileController@update', 
	'as' => 'profile.update'
]);

Route::put('/store/update/{userId}', [
	'uses' => 'ProfileController@updateStore',
	'as' => 'store.update'
]);