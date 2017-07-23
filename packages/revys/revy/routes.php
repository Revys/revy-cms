<?php

Route::group([
	'prefix' => config('revy.admin.path'), 
	'namespace' => '\Revys\Revy\App\Http\Controllers',
	'middleware' => ['web'],
], function () {
	// Variables
	$locale = request()->segment(1);

	// Routes
	Route::group(['prefix' => $locale, 'middleware' => 'lang'], function () {

		// Routes
		
	});

});