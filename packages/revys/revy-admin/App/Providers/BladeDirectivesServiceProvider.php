<?php

namespace Revys\RevyAdmin\App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Request;

class BladeDirectivesServiceProvider extends ServiceProvider
{
	public function register()
	{
		Blade::directive('includeDefault', function ($expression) {
			return "<?php echo \$__env->make(\$controller->getViewRoute($expression), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>";
		});
	}
}
