<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\Userpolicy;
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
        
        User::class => Userpolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('edit-user', function (User $user) {
            return $user->hasManyRoles(['admin','auteur']);
        });

        Gate::define('update-user', function (User $user) {
            return $user->hasManyRoles(['admin','auteur']);
        });

        Gate::define('index', function (User $user) {
            return $user->hasManyRoles(['admin','auteur']);
        });

        Gate::define('delete-user', function (User $user) {
            return $user->isAdmin();
        });

    }
    
}
