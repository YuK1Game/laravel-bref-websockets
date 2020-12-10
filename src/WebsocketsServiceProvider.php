<?php

namespace Yuk1\LaravelBrefWebsockets;

use Illuminate\Support\ServiceProvider;

use ConnectionPool\ConnectionPool;

class WebsocketsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'yuk1');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'yuk1');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/websockets.php', 'websockets');

        // Register the service the package provides.
        $this->app->singleton('websockets', function ($app) {
            return new Websockets;
        });

        $this->app->bind(ConnectionPool::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['websockets'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/websockets.php' => config_path('websockets.php'),
        ], 'websockets.config');

        $this->publishes([
            __DIR__.'/../routes/websockets.php' => base_path('routes/websockets.php'),
        ], 'websockets.routes');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/yuk1'),
        ], 'laravel-bref-websockets.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/yuk1'),
        ], 'laravel-bref-websockets.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/yuk1'),
        ], 'laravel-bref-websockets.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
