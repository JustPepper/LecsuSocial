<?php

Route::get('/sitio', function () {
    return view('layouts.homePage');
});

route::get('/test', function() {
    $user = App\User::find(666);
    dd(App\Models\Like::where('belongs_id', 1)->where('author_id', $user->id)->get());
});

Route::group(['middleware' => 'web'], function () {

	/*----------------------------------------------
	|	Login/Register Routes
	|----------------------------------------------*/    
    Route::get('/iniciar', 'Auth\AuthController@showLoginForm')->name('login');
    Route::post('login', 'Auth\AuthController@login')->name('postLogin');
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');

    Route::get('/registro', 'Auth\AuthController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\AuthController@register')->name('postRegister');

    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm')->name('reset');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');


    /*----------------------------------------------
    |   Content Routes
    |----------------------------------------------*/
    include("Controllers/Content/routes.php");


    /*----------------------------------------------
    |   Auth routes
    |----------------------------------------------*/
    Route::group(['middleware' => 'auth'], function () {
    	
        /* User Controllers */
        include("Controllers/User/routes.php");
        /* API Routes */
        include("Controllers/API/api_routes.php");

    });  
});
