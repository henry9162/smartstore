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
	'as' => 'auth.register'
]);

Route::post('/register', [
	'uses' => 'AuthController@Register',
	'as' => 'auth.postRegister'
]);

Route::get('/signIn', [
	'uses' => 'AuthController@getSignIn',
	'as' => 'auth.signIn'
]);

Route::post('/signIn', [
	'uses' => 'AuthController@signIn',
	'as' => 'auth.postSignIn'
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

/*Route::get('tag/{id}', [
	'uses' => 'TagController@getTag',
	'as' => 'tag.page'
]);*/

Route::resource('tags', 'TagController', ['except' => ['create']]);

