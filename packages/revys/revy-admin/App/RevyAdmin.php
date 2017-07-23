<?php

namespace Revys\RevyAdmin\App;

use Request;

class RevyAdmin
{
	public static function layout($name)
	{
		return (Request::ajax() ? 'admin::layouts.ajax' : 'admin::layouts.' . $name);
	}
}
