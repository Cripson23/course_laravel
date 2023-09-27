<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* \Illuminate\Support\Facades\DB::beforeExecuting(function($query, $params){
            echo '<div>';
            var_dump($query);
            var_dump($params);
            echo '<hr>';
            echo '</div>';
        }); */
    }
}
