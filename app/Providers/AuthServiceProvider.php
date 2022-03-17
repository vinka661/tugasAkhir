<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('operator-plkb', function($user){
            return $user->role == "Operator PLKB";
        });
        Gate::define('kepala-plkb', function($user){
            return $user->role == "Kepala PLKB";
        });
        Gate::define('bidan-desa', function($user){
            return $user->role == "Bidan Desa";
        });
        Gate::define('kader', function($user){
            return $user->role == "Kader";
        });
        Gate::define('ibu-bayi', function($user){
            return $user->role == "Ibu Bayi";
        });
    }
}
