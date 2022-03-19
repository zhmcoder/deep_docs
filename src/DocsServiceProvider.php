<?php

namespace Andruby\DeepDocs;

use Andruby\DeepDocs\Commands\InstallCommand;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Andruby\DeepAdmin\Admin;

class DocsServiceProvider extends ServiceProvider
{

    protected $commands = [
        InstallCommand::class
    ];
//
//    protected $routeMiddleware = [
//        'admin.auth' => Middleware\Authenticate::class,
//        'admin.log' => Middleware\LogOperation::class,
//        'admin.permission' => Middleware\Permission::class,
//        'admin.bootstrap' => Middleware\Bootstrap::class,
//        'admin.session' => Middleware\Session::class,
//    ];

//    /**
//     * The application's route middleware groups.
//     *
//     * @var array
//     */
//    protected $middlewareGroups = [
//        'admin' => [
//            'admin.auth',
//            'admin.log',
//            'admin.bootstrap',
//            'admin.permission'
//        ],
//    ];

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'deep-docs');

//        $this->loadViewsFrom(__DIR__ . '/../resources/views/mero', 'Mero');

        $this->loadRoutesFrom(__DIR__ . '/../routes/route.php');
//        Admin::script('deep-admin', __DIR__.'/../dist/js/extend.js');
//        Admin::style('deep-admin', __DIR__.'/../dist/css/extend.css');

        if (file_exists($routes = app_path('Api') . '/routes.php')) {
            $this->loadRoutesFrom($routes);
        }

        $this->registerPublishing();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/deep_docs.php', 'deep_docs');

        $this->loadAdminAuthConfig();

        $this->registerRouteMiddleware();

        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }


    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config' => config_path()], 'deep-docs-config');
            $this->publishes([__DIR__ . '/../resources/lang' => resource_path('lang')], 'deep-docs-lang');
            $this->publishes([__DIR__ . '/../resources/views' => resource_path('views')], 'deep-docs-views');
//            $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'deep-docs-migrations');
//            $this->publishes([__DIR__ . '/../dist' => public_path('vendor/deep-docs')], 'deep-docs-assets');
        }
    }

    protected function loadAdminAuthConfig()
    {
//        config(Arr::dot(config('deep_admin.auth', []), 'auth.'));
    }


    protected function registerRouteMiddleware()
    {
//        // register route middleware.
//        foreach ($this->routeMiddleware as $key => $middleware) {
//            app('router')->aliasMiddleware($key, $middleware);
//        }
//
//        // register middleware group.
//        foreach ($this->middlewareGroups as $key => $middleware) {
//            app('router')->middlewareGroup($key, $middleware);
//        }
    }

}
