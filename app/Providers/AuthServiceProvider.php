<?php

namespace App\Providers;

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

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        Gate::define('admin', function ($user) {
            return $user->hasRole('admin');
        });
    
        Gate::define('user', function ($user) {
            return $user->hasRole('user');
        });

        Gate::define('sales', function ($user) {
            return $user->hasRole('sales');
        });

        Gate::define('doctor', function ($user) {
            return $user->hasRole('doctor');
        });

        Gate::define('operation', function ($user) {
            return $user->hasRole('operation');
        });

        Gate::define('stock', function ($user) {
            return $user->hasRole('stock');
        });

        Gate::define('receiption', function ($user) {
            return $user->hasRole('receiption');
        });

        


    }
}
