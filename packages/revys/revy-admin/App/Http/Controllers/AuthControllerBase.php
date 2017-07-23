<?php

namespace Revys\RevyAdmin\App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthControllerBase extends Controller
{
	public function login()
	{
		return \View::make('admin::auth.login');
	}

	public function signin(Request $request)
	{
		$id = $request->input('id');
		$password = $request->input('password');
		$remember = $request->input('remember');

		if (
			!Auth::attempt(['name' => $id, 'password' => $password], $remember) and
			!Auth::attempt(['email' => $id, 'password' => $password], $remember)			
		) {
			return [
				'error' => __('Неверный логин или пароль'),
				'id' => $id,
				'remember' => $remember
			];
		}
	}

	public function logout()
	{
		Auth::logout();

		return \Redirect::back();
	}
}
