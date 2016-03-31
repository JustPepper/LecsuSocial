<?php
	Route::group(['namespace' => 'User'], function() {
		Route::get('/', 'PagesController@index');
		Route::get('comunidad', 'PagesController@community')->name('community');
		Route::get('perfil/{alias}', 'PagesController@profile')->name('profile');
		/* Functionality */
		Route::post('status', 'StatusController@storeStatus')->name('storeStatus');
		Route::post('photo', 'UserController@uploadPhoto')->name('photo');
		Route::post('comment/{id}', 'StatusController@storeComment')->name('storeComment');
		Route::post('reply/{id}', 'StatusController@storeReply')->name('storeReply');
		Route::post('status/{id}/like', 'StatusController@likeStatus')->name('likeStatus');
		Route::post('comment/{id}/like', 'StatusController@likeComment')->name('likeComment');
		Route::get('search', 'UserController@searchUsers')->name('searchUsers');
		Route::post('follow/{id}', 'UserController@follow')->name('follow');
	});
