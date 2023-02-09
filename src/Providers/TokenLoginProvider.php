<?php

namespace Tcoders\TokenLogin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

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

    protected function dbConfiguration()
    {
        return [
            'driver' => 'mysql',
            'url' => env('CROSS_DOMAIN_DATABASE_URL', env('DATABASE_URL')),
            'host' => env('CROSS_DOMAIN_DB_HOST', env('DB_HOST', '127.0.0.1')),
            'port' => env('CROSS_DOMAIN_DB_PORT', env('DB_PORT', '3306')),
            'database' => env('CROSS_DOMAIN_DB_DATABASE', env('DB_DATABASE', 'forge')),
            'username' => env('CROSS_DOMAIN_DB_USERNAME', env('DB_USERNAME', 'forge')),
            'password' => env('CROSS_DOMAIN_DB_PASSWORD', env('DB_PASSWORD', '')),
            'unix_socket' => env('CROSS_DOMAIN_DB_SOCKET', env('DB_SOCKET', '')),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                \PDO::MYSQL_ATTR_SSL_CA => env('CROSS_DOMAIN_MYSQL_ATTR_SSL_CA', env('MYSQL_ATTR_SSL_CA')),
            ]) : [],
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
        Config::set([
            'database.connections.auth_db' => $this->dbConfiguration(),
            'auth.providers.users.model' => \Tcoders\TokenLogin\Models\User::class
        ]);
        $this->registerRoutes();
    }
}