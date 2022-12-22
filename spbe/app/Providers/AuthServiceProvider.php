<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        // perencanaan
        Gate::define('developer', function (User $user) {
            return $user->role_id == '0';
        });

        // pengelolaan
        Gate::define('admin-spbe', function (User $user) {
            return $user->role_id == '1';
        });

        // usulan
        Gate::define('admin-provinsi', function (User $user) {
            return $user->role_id == '2';
        });

        // persetujuan
        Gate::define('admin-kabkota', function (User $user) {
            return $user->role_id == '3';
        });

        // role
        Gate::define('pimpinan', function (User $user) {
            return $user->role_id == '4';
        });

        Gate::define('admin-pusat', function (User $user) {
            return $user->role_id == '5';
        });


    }
}
