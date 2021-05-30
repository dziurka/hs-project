<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
        \Domain\Auth\Actions\ILoginAction::class => \Domain\Auth\Actions\RateLimitedLoginAction::class,
        \Domain\Auth\Actions\ILogoutUserAction::class => \Domain\Auth\Actions\LogoutUserAction::class,
        \Domain\Auth\Actions\ISignUpAction::class => \Domain\Auth\Actions\SignUpAction::class,
        \Domain\Users\Repositories\IUserRepository::class => \Domain\Users\Repositories\UserRepository::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
    }
}
