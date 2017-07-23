<?php

namespace Revys\Revy\App;

use App;

class RevyBase
{
	protected static $language;

	public function __construct()
	{
		
	}

	/**
	 * Get application Language instance
	 */
	public static function getLanguage()
	{
		if (! self::$language)
			self::$language = Language::findByCode(App::getLocale());

		if (! self::$language)
			abort(404, 'Language could not be found');

		return self::$language;
	}
	
	/**
	 * Get application Language code
	 */
	public static function getLocale()
	{
		return self::$language->code;
	}
}