<?php

namespace Revys\RevyAdmin\App\Http\Composers;

use Revys\Revy\App\Revy;
use View;
use Auth;


class GlobalsComposer
{
    protected static $data;

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose()
    {
        self::$data = [
            'locale' => Revy::getLanguage(),
            'user' => Auth::user(),
            'controller' => self::getController(),
            'controller_name' => self::getControllerName(),
            'action' => self::getAction()
        ];

        View::share(self::$data);
    }

    public static function get($key)
    { 
        return self::$data[$key];
    }

    public static function getControllerName()
    {
        if (isset(self::$data['controller_name']))
            return self::$data['controller_name'];

        $controller = request()->route('controller');
 
        if ($controller == '') {
            list($class, $action) = explode('@', request()->route()->action['controller']);
            $controller = snake_case(str_replace('Controller', '', class_basename($class)));

            self::$data['action'] = $action;
        }

        return $controller;
    }

    public static function getController()
    {
        if (isset(self::$data['controller']))
            return self::$data['controller'];

        $controller = self::getControllerName();

        return app()->make('\Revys\RevyAdmin\App\Http\Controllers\\' . studly_case($controller) . 'Controller');
    }

    public static function getAction()
    {
        if (isset(self::$data['action']))
            return self::$data['action'];

        $action = request()->route('action');

        if ($action == '') { 
            list($prefix, $action) = explode('::', request()->route()->action['as']);
        }

        return $action;
    }
}