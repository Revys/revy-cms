<?php

namespace Revys\RevyAdmin\App\Http\Middleware;

use Closure;
use App;
use Auth;
use Revys\Revy\App\Revy;

class BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->route()->setParameter('prefix', true);

        if (request()->segment(2) == '')
            return redirect($request->route()->getPrefix() . '/' . Revy::getLanguage()->code);

        if (strpos(\Route::current()->getName(), 'admin::login') === false)
        {
            if (!Auth::user())
                return \Route::dispatch(
                    \Request::create(route('admin::login::login-form'), 'GET')
                );
            else if (!Auth::user()->isAdmin())
                return abort('403');
        }        

        return $next($request);
    }
}
