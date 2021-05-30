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
        \Domain\StarWars\Repositories\Swapi\ISwapiRepository::class => \Domain\StarWars\Repositories\Swapi\SwapiRepository::class,
        \Domain\StarWars\Repositories\Swapi\ISwapiPersonRepository::class => \Domain\StarWars\Repositories\Swapi\SwapiPersonRepository::class,
        \Domain\StarWars\Repositories\Swapi\ISwapiFilmRepository::class => \Domain\StarWars\Repositories\Swapi\SwapiFilmRepository::class,
        \Domain\StarWars\Actions\IImportStartWarsFilmsAction::class => \Domain\StarWars\Actions\ImportStartWarsFilmsAction::class,
        \Domain\StarWars\Repositories\IFilmRepository::class => \Domain\StarWars\Repositories\FilmRepository::class,
        \Domain\StarWars\Actions\IImportStartWarsPersonsAction::class => \Domain\StarWars\Actions\ImportStartWarsPersonsAction::class,
        \Domain\StarWars\Repositories\IPersonRepository::class => \Domain\StarWars\Repositories\PersonRepository::class,
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
