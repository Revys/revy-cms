<?php

namespace Revys\RevyAdmin\App\Helpers;

use Revys\RevyAdmin\App\Indexer;

class RoutesBase
{
    /**
     * @param string $controller
     * @return string
     */
    public static function getAdminControllerClassName($controller)
    {
        return app()->make(Indexer::class)->getMappedClass(
            "\Revys\RevyAdmin\App\Http\Controllers\\" . studly_case($controller) . "Controller"
        );
    }
}