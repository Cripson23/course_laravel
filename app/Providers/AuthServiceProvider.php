<?php

namespace App\Providers;

use App\Services\Auth\AuthApiService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function register()
    {
        $this->app->singleton(AuthApiService::class, function () {
            return new AuthApiService();
        });
    }

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /*Gate::define('cars', function($user){
            return $user->id === 11; // wtf! not repeat it in real world!!!
        });*/
    }
}
