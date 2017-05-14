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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function () {
	//Tag
	Route::get('tag/search', ['as' => 'tag.search', 'uses' => 'Admin\TagController@getSearch']);
	Route::get('tag', ['as' => 'tag.index', 'uses' => 'Admin\TagController@index']);
	Route::get('tag/create', ['as' => 'tag.create', 'uses' => 'Admin\TagController@create']);
	Route::post('tag', ['as' => 'tag.store', 'uses' => 'Admin\TagController@store']);
	Route::get('tag/{id}', ['as' => 'tag.show', 'uses' => 'Admin\TagController@show']);
	Route::put('tag/{id}', ['as' => 'tag.update', 'uses' => 'Admin\TagController@update']);
	Route::delete('tag/{id}', ['as' => 'tag.destroy', 'uses' => 'Admin\TagController@destroy']);

	//Group
	Route::get('group/search', ['as' => 'group.search', 'uses' => 'Admin\GroupController@getSearch']);
	Route::get('group', ['as' => 'group.index', 'uses' => 'Admin\GroupController@index']);
	Route::get('group/create', ['as' => 'group.create', 'uses' => 'Admin\GroupController@create']);
	Route::post('group', ['as' => 'group.store', 'uses' => 'Admin\GroupController@store']);
	Route::get('group/{id}', ['as' => 'group.show', 'uses' => 'Admin\GroupController@show']);
	Route::put('group/{id}', ['as' => 'group.update', 'uses' => 'Admin\GroupController@update']);
	Route::delete('group/{id}', ['as' => 'group.destroy', 'uses' => 'Admin\GroupController@destroy']);
});




Route::auth();

Route::get('/home', 'HomeController@index');
