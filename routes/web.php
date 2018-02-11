<?php

if (! App::runningUnitTests() && App::runningInConsole())
    return;

use Revys\Revy\App\Routes;

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

Route::get('/', 'PageController@page');

Routes::withLanguage(function() {
    Routes::definePageRoutes();

    Route::post('/send/contact', 'MailController@contact');
});