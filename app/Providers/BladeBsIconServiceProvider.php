<?php

namespace App\Providers;

use App\Services\Test\Test2Service;
use App\Services\Test\TestService;
use App\Services\Test\TestServiceInterface;
use Illuminate\Support\ServiceProvider;

class BladeBsIconServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        /*$this->app->singleton(TestServiceInterface::class, function () {
            return new Test2Service('a', 'b', 'c', 'd');
        });*/
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();
        $blade->extend(function($value) {
            return preg_replace_callback('/@icon\(\'([^\']+)\'\)/', function($matches) {
                return "<i class='bi bi-$matches[1]'></i>";
            }, $value);
        });
    }
}
