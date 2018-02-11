<?php

use Intervention\Image\ImageServiceProvider;
use Revys\RevyAdmin\App\Helpers\RoutesBase;

Route::group([
	'prefix' => config('admin.config.path'), 
	'namespace' => '\Revys\RevyAdmin\App\Http\Controllers',
	'middleware' => ['web', 'admin'],
	'as' => 'admin::',
], function () {
//	if (request()->segment(1) == config('admin.config.path'))
    (new Revys\RevyAdmin\App\Providers\RevyAdminServiceProvider(app()))->initProviders();

	// Variables
	$locale = request()->segment(2);

	// Core routes
	Route::get('', config('admin.config.default_route'));

	// Routes
	Route::group(['prefix' => $locale, 'middleware' => 'admin_lang'], function () {

		// Default route
		Route::get('', config('admin.config.default_route'))->name('home');

		// Routes
		// ========================================================

		// Login
		Route::group(['as' => 'login::'], function () {
			Route::get('login', 'AuthController@login')->name('login-form');
			Route::post('login', 'AuthController@signin')->name('signin');
			Route::get('logout', 'AuthController@logout')->name('logout');
		});

		// Admin Settings
		Route::get('settings', function(){
			abort(404);
		})->name('settings');



		// List Path
		Route::get('{controller}', function($controller){
            $class = app()->make(RoutesBase::getAdminControllerClassName($controller));
			return $class->callAction('index', $parameters = []);
		})->where([
			'controller' => '\w+'
		])->name('list');

		// Base Path
		Route::any('{controller}/{action}/{object?}', function($controller, $action = 'index', $object = null){
			$class = app()->make(RoutesBase::getAdminControllerClassName($controller));
			return $class->callAction($action, $parameters = [$object]);
		})->where([
			'controller' => '\w+',
			'action' => '\w{0,}',
			'object' => '\w{0,}'
		])->name('path');

		if (request()->ajax()) {
			Route::post('{controller}/{action}', function($controller, $action = 'index'){
				$class = app()->make(RoutesBase::getAdminControllerClassName($controller));
				return $class->callAction($action, $parameters = []);
			})->where([
				'controller' => '\w+',
				'action' => '\w{0,}'
			])->name('ajax');
		}


		// CRUD
		
		// Edit Path
		Route::get('{controller}/edit/{id}', function($controller, $id){
			$class = app()->make(RoutesBase::getAdminControllerClassName($controller));
			return $class->callAction('edit', $parameters = [$id]);
		})->where([
			'controller' => '\w+',
			'id' => '\d+'
		])->name('edit');

		// Update Path
		Route::post('{controller}/update/{id}', function($controller, $id){
			$class = app()->make(RoutesBase::getAdminControllerClassName($controller));
			return $class->callAction('update', $parameters = [$id]);
		})->where([
			'controller' => '\w+',
			'id' => '\d+'
		])->name('update');

		// Create Path
		Route::get('{controller}/create', function($controller){
			$class = app()->make(RoutesBase::getAdminControllerClassName($controller));
			return $class->callAction('create', $parameters = []);
		})->where([
			'controller' => '\w+',
		])->name('create');
		
		// Insert Path
		Route::post('{controller}/insert', function($controller){
			$class = app()->make(RoutesBase::getAdminControllerClassName($controller));
			return $class->callAction('insert', $parameters = []);
		})->where([
			'controller' => '\w+'
		])->name('insert');
		
		// Delete Path
		Route::get('{controller}/delete/{id}', function($controller, $id){
			$class = app()->make(RoutesBase::getAdminControllerClassName($controller));
			return $class->callAction('delete', $parameters = [$id]);
		})->where([
			'controller' => '\w+',
			'id' => '\d+'
		])->name('delete');
	});

});