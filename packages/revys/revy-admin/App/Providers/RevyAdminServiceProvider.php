<?php

namespace Revys\RevyAdmin\App\Providers;

use Revys\RevyAdmin\App\RevyAdmin;
use Illuminate\Support\ServiceProvider;

class RevyAdminServiceProvider extends ServiceProvider
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
        $router->aliasMiddleware('admin', \Revys\RevyAdmin\App\Http\Middleware\BaseMiddleware::class);
        $router->aliasMiddleware('admin_lang', \Revys\RevyAdmin\App\Http\Middleware\LanguageMiddleware::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RevyAdmin::class);

        $composer = new ComposerServiceProvider($this->app);
        $composer->register();

        $directives = new BladeDirectivesServiceProvider($this->app);
        $directives->register();
    }

    public function load()
    {
        // Routes
        $this->loadRoutesFrom(self::$packagePath.'/routes.php');

        // Views
        $this->loadViewsFrom(self::$packagePath.'/resources/views', 'admin');

        $this->publishes([
            self::$packagePath.'/resources/views' => base_path('resources/views/vendor/admin'),
        ], 'views');

        // Translations    
        $this->loadTranslationsFrom(self::$packagePath.'/translations', 'admin');

        // Config
        $this->publishes([
            self::$packagePath.'/config/config.php' => config_path(self::$packageAlias.'/admin.php'),
        ], 'config');

        $this->mergeConfigFrom(
            self::$packagePath.'/config/config.php', self::$packageAlias
        );

        // Assets
        $this->publishes([
            self::$packagePath.'/assets' => public_path('admin-assets'),
        ], 'public');
        
        // Migrations
        $this->loadMigrationsFrom(self::$packagePath.'database/migrations');
        /*$this->publishes([
            self::$packagePath.'/database/migrations/' => database_path('migrations')
        ], 'migrations');*/
    }

    public function loadCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                
            ]);
        }
    }
}
