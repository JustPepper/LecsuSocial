<?php

	Route::group(['namespace' => 'Content'], function() {

		Route::get('contenido', 'ContentController@index')->name('content');

	});


?>
