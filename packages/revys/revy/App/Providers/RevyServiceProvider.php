<?php

namespace Revys\Revy\App\Providers;

use Revys\Revy\App\Revy;
use Revys\Revy\App\Overrides;
use Illuminate\Support\ServiceProvider;

class RevyServiceProvider extends ServiceProvider
{
    public static $packagePath = __DIR__.'/../../';
    public static $packageAlias = 'revy';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->load();

        $this->loadCommands();

        // Middlewares
        $router->aliasMiddleware('lang', \Revys\Revy\App\Http\Middleware\LanguageMiddleware::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadCommands();

        $this->app->singleton(\Revy::class);
        $this->app->singleton(Overrides::class);

        $overrides = $this->app->make(Overrides::class);
        $overrides->register();
    }

    public function load()
    {
        // Routes
        $this->loadRoutesFrom(self::$packagePath.'/routes.php');

        // Views
        $this->publishes([
            self::$packagePath.'/resources/views' => resource_path('views/vendor/'.self::$packageAlias),
        ], 'views');

        // Translations    
        $this->publishes([
            self::$packagePath.'/translations' => resource_path('lang/vendor/'.self::$packageAlias),
        ], 'translations');

        // Config
        $this->publishes([
            self::$packagePath.'/config/config.php' => config_path(self::$packageAlias.'/config.php'),
            self::$packagePath.'/config/translatable.php' => config_path(self::$packageAlias.'/translatable.php'),
        ], 'config');

        // Assets
        $this->publishes([
            self::$packagePath.'/assets' => public_path('vendor/'.self::$packageAlias),
        ], 'public');

        // Migrations
        $this->loadMigrationsFrom(self::$packagePath.'/database/migrations');
        $this->publishes([
            self::$packagePath.'/database/migrations/' => database_path('migrations')
        ], 'migrations');

        // Factories
        $this->publishes([
            self::$packagePath.'/database/factories' => database_path('factories')
        ], 'factories');
    }

    public function loadCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                'Revys\Revy\App\Console\Commands\Overrides\MakeOverrideClass',
                'Revys\Revy\App\Console\Commands\Overrides\IndexOverridesClass',
            ]);
        }
    }
}
