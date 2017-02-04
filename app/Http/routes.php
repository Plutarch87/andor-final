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
Route::post('send-email', [
		'as' => 'sendEmail',
		'uses' => 'ItemController@sendEmailReminder'
	]);

Route::get('narudzbine_statistika', function()
{
	return view('narudzbine_statistika');
});
//edit
Route::post('add-to-cart/{id}', [
		'as' => 'item.addToCart',	
		'uses' => 'CartController@addToCart'
	]);
//update
Route::post('reduce-one/{id}', [
		'as' => 'item.reduceByOne',
		'uses' => 'CartController@getReduceByOne'
	]);
//destroy
Route::post('reduce-all/{id}', [
		'as' => 'item.removeItem',
		'uses' => 'CartController@getRemoveItem'
	]);
//index
Route::get('shopping-cart', [
	'as' => 'item.showCart',
	'uses' => 'CartController@showCart'
	]);
//create
Route::get('checkout', [
		'as' => 'shop.checkout',
		'uses' => 'CartController@getCheckout'
	]);
//store
Route::post('checkout', [
		'as' => 'shop.checkout',
		'uses' => 'CartController@postCheckout'
	]);

Route::get('/', [
		'as' => 'index',
		'uses' => 'CategoryController@index',
	]);
// KATEGORIJE
Route::get('kategorije', [
		'as' => 'kategorije.index',
		'uses' => 'CategoryController@index'
	]);
Route::get('kategorije/{kategorije}', [
		'as' => 'kategorije.show',
		'uses' => 'CategoryController@show'
	]);
Route::resource('categories', 'CategoryController', [
		'only' => [ 'store',  'destroy'],
	]);

// POTKATEGORIJE
Route::delete('subcats/{subcat}', [
	'uses' => 'SubcatController@destroy',
	'as' => 'subcats.destroy'
	]);

Route::get('kategorije/{kategorije}/{potkategorije}', [
		'as' => 'kategorije.potkategorije.show',
		'uses' => 'SubcatController@show'
	]);

Route::resource('categories.subcats', 'SubcatController');

// ITEMS
Route::resource('items', 'ItemController');

// ITEMS - PONUDE

Route::group(['prefix' => 'ponude'], function(){
	Route::get('novo', 'ItemController@novo');
	Route::get('popular', 'ItemController@popular');
	Route::get('akcija', 'ItemController@akcija');
});

// ITEMS - INACTIVE
Route::group(['prefix' => 'inactive'], function(){
	Route::get('/', ['as' => 'inactive', 'uses' => 'ItemController@showTrashed']);
	Route::get('/{item}', ['as' => 'inactive.item', 'uses' => 'ItemController@restoreTrashed']);
	Route::delete('/{item}', ['as' => 'inactive.delete', 'uses' => 'ItemController@deleteTrashed']);
});

Route::get('carousel', [
	'middleware' => 'auth',
	'as' => 'carousel.index',
	'uses' => 'CarouselController@index'
]);

Route::post('carousel', [
	'middleware' => 'auth',
	'as' => 'carousel.store',
	'uses' => 'CarouselController@store'
]);

Route::get('andor-admin', function(){
	return view('admin.index');
});

Route::get('admin', function() {
	return view('admin.admin');
});

Route::post('andor-admin', 'Auth\AuthController@login');

Route::get('logout', 'Auth\AuthController@logout');

Route::get('admin/get-all-items', 'ItemController@getAllItems');
Route::get('admin/get-item/{id}', 'ItemController@getItem');
