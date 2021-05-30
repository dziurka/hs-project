<?php

namespace Support\Services;

class RouteUrlGenerator extends \Illuminate\Routing\RouteUrlGenerator
{

    protected function getRouteDomain($route, &$parameters): ?string
    {
        $spaUrl = app(SpaUrl::class);

        return match ($route->getDomain()) {
            null => null,
            $spaUrl->getHostAndPort() => $spaUrl->getUrl(),
            default => $this->formatDomain($route, $parameters)
        };
    }

    protected function getRouteScheme($route): string
    {
        $spaUrl = app(SpaUrl::class);

        if ($route->getDomain() === $spaUrl->getHostAndPort()) {
            return $spaUrl->getScheme() . '://';
        }

        return parent::getRouteScheme($route);
    }
}
