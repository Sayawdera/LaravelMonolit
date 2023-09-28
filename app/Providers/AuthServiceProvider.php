<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use App\Constants\UserRole;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));


        $this->registerPolicies();


        Gate::define('super_admin', function (User $user)
        {
            return $user->getActiveRole()->role_code === UserRole::SUPER_ADMIN;
        });

        Gate::define('moderator', function (User $user)
        {
            return $user->getActiveRole()->role_code === UserRole::MODERATOR;
        });

        Gate::define('editor', function (User $user)
        {
            return $user->getActiveRole()->role_code === UserRole::EDITOR;
        });

        Gate::define('user', function (User $user)
        {
            return $user->getActiveRole()->role_code === UserRole::USER;
        });

        Gate::define('super_user', function (User $user)
        {
            return $user->getActiveRole()->role_code === UserRole::SUPER_USER;
        });

        Gate::define('new_user', function (User $user)
        {
            return $user->getActiveRole()->role_code === UserRole::NEW_USER;
        });
    }
}
