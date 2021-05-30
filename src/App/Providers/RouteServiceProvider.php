<?php

namespace App\Providers;

use Closure;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Support\Services\SpaUrl;
use Support\Services\UrlGenerator;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\API';

    public const HOME = '/home';

    public function register(): void
    {
        parent::register();

        $this->rebindUrlGenerator();

        $this->app->singleton(SpaUrl::class);
    }

    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapSpaRoutes();
    }

    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapSpaRoutes(): void
    {
        Route::domain(spa_url())
            ->namespace($this->namespace)
            ->group(base_path('routes/spa.php'));
    }

    /**
     * @note overwrite UrlGenerator for supporting SPA routes
     */
    private function rebindUrlGenerator(): void
    {
        $this->app->singleton('url', function ($app) {
            $routes = $app['router']->getRoutes();
            $app->instance('routes', $routes);

            return new UrlGenerator(
                $routes,
                $app->rebinding('request', $this->requestRebinder()),
                $app['config']['app.asset_url']
            );
        });
    }

    private function requestRebinder(): Closure
    {
        return function ($app, $request) {
            $app['url']->setRequest($request);
        };
    }
}
