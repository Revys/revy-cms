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

//Route::get('/', 'PageController@index');

// Route::get('/{locale}', 'PageController@index')->where('locale', '[a-z]{0,}');

$locale = request()->segment(1);
if (strlen($locale) <= 2) {
	Route::group(['prefix' => $locale, 'middleware' => 'lang'], function () {

		Route::get('/', 'PageController@index');
		
		Route::post('/send/contact', 'MailController@contact');

	});
}