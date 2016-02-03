<?php

// Route::get('/',[
// 	'uses' => '\Chatty\Http\Controllers\HomeController@index',
// 	'as' => 'home',

// ]);



Route::group(['middleware' => ['web']], function () {

	Route::get('/',[
	'uses' => '\Chatty\Http\Controllers\HomeController@index',
	'as' => 'home',

	]);
	

	Route::get('/alert', function(){
	return redirect()->route('home')->with('info', ' You have signed up!');
	});

    
    Route::get('/signup',[
	'uses' => '\Chatty\Http\Controllers\AuthController@getSignup',
	'as' => 'auth.signup',
	'middleware' =>['guest'],

	]);

	Route::post('/signup',[
		'uses' => '\Chatty\Http\Controllers\AuthController@postSignup',
		'as' => 'auth.signup',
		'middleware' =>['guest'],

	]);

	 Route::get('/signin',[
	'uses' => '\Chatty\Http\Controllers\AuthController@getSignin',
	'as' => 'auth.signin',
	'middleware' =>['guest'],

	]);

	Route::post('/signin',[
		'uses' => '\Chatty\Http\Controllers\AuthController@postSignin',
		'as' => 'auth.signin',
		'middleware' =>['guest'],

	]);

	Route::get('/signout',[
	'uses' => '\Chatty\Http\Controllers\AuthController@getSignout',
	'as' => 'auth.signout',

	]);



	// Search functions

	Route::get('search', [
		'uses' => '\Chatty\Http\Controllers\SearchController@getResults',
		'as' => 'search.results',
		]);

	// Get profile information
	Route::get('user/{username}', [
		'uses' => '\Chatty\Http\Controllers\ProfileController@getProfile',
		'as' => 'profile.index',
		]);


	Route::get('profile/edit', [
		'uses' => '\Chatty\Http\Controllers\ProfileController@getEdit',
		'as' => 'profile.edit',
		'middleware'=> ['auth'],

		]);

	Route::post('profile/edit', [
		'uses' => '\Chatty\Http\Controllers\ProfileController@postEdit',
		'as' => 'profile.edit',
		'middleware'=> ['auth'],

		]);

// Friends Routes
	Route::get('/friends', [
		'uses' => '\Chatty\Http\Controllers\FriendController@getIndex',
		'as' => 'friend.index',
		'middleware'=> ['auth'],

		]);


});


