<?php

namespace Tcoders\TokenLogin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class TokenLoginProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'cross_domain');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'middleware' => ['web'],
        ];
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
              __DIR__.'/../config/config.php' => config_path('cross_domain.php'),
            ], 'config');
        
        }
        $this->registerRoutes();
    }
}