<?php
    Route::group(['namespace' => 'API'], function() { 

        Route::group(['prefix' => 'api'], function() {
            Route::get('photo', 'ApiController@photo');
            Route::get('check/{id}', 'ApiController@checkFollower');
            Route::get('status/like/{id}', 'ApiController@checkStatusLike');
            Route::get('comment/like/{id}', 'ApiController@checkCommentLike');
        });

    });
