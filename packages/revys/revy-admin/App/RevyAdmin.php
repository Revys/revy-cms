<?php

namespace Revys\RevyAdmin\App;

use Request;
use Illuminate\Support\Facades\Session;

class RevyAdmin
{
	public static function layout($name)
	{
		return (Request::ajax() ? 'admin::layouts.ajax' : 'admin::layouts.' . $name);
	}

	public static function onlyForAjax()
	{
		if (! Request::ajax())
			return abort(403, 'Only ajax method');
	}

	public static function isTranslationMode()
	{
        return Session::get('admin::translation_mode', false);
	}

	public static function getTranslationFieldName($field, $language_code)
	{
		return '__' . $language_code . '_' . $field;
	}
}
