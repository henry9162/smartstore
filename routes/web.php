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

Route::post('/register', [
	'uses' => 'AuthController@Register',
	'as' => 'auth.postRegister'
]);

Route::get('/signin', [
	'uses' => 'AuthController@getSignIn',
	'as' => 'signIn'
]);

Route::post('/signIn', [
	'uses' => 'AuthController@signIn',
	'as' => 'auth.signIn'
]);


Route::get('/logout', [
	'uses' => 'AuthController@logout',
	'as' => 'logout'
]);

	
Route::get('/store', [
	'uses' => 'StoreController@getcreate',
	'as' => 'showCreateStore',
	'middleware' => 'auth'
]);

Route::post('/store', [
	'uses' => 'StoreController@create',
	'as' => 'createStore',
	'middleware' => 'auth'
]);

Route::get('/store/{user_id}', [
	'uses' => 'StoreController@index',
	'as' => 'store.index'
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


Route::post('/products', [
	'uses' => 'ProductController@createProduct', 
	'as' => 'product.store'
]);

Route::put('/product/{productId}', [
	'uses' => 'ProductController@updateProduct', 
	'as' => 'product.update'
]);

Route::get('/product/{slug}', [
	'uses' => 'ProductController@getSingle', 
	'as' => 'product.single'
])->where('slug', '[\w\d\-\_]+');

Route::get('/add-to-cart/{productId}', [
	'uses' => 'ProductController@getAddToCart', 
	'as' => 'product.cart'
]);

Route::get('/shopping-cart', [
	'uses' => 'ProductController@getCart', 
	'as' => 'product.shoppingCart'
]);

Route::post('/shopping-cart/{productId}', [
	'uses' => 'ProductController@getUpdateToCart', 
	'as' => 'product.updateShoppingCart'
]);

Route::get('/clearedCart/{storeId}', [
	'uses' => 'ProductController@clearCart', 
	'as' => 'clearCart'
]);

Route::get('/checkout', [
	'uses' => 'ProductController@getCheckout', 
	'as' => 'checkout'
]);

Route::post('/checkout', [
	'uses' => 'ProductController@postCheckout', 
	'as' => 'postCheckout',
	'middleware' => 'auth'
]);


Route::get('/orders', [
	'uses' => 'ProductController@getOrder', 
	'as' => 'orders'
]);