<?php

namespace Support\Services;

class UrlGenerator extends \Illuminate\Routing\UrlGenerator
{

    protected function routeUrl(): RouteUrlGenerator
    {
        if (!$this->routeGenerator) {
            $this->routeGenerator = new RouteUrlGenerator($this, $this->request);
        }

        return $this->routeGenerator;
    }

    public function signedRouteSpa(
        $internalRoute, $spaRoute, $parameters = [], $expiration = null, $absolute = true
    ): string
    {
        $signedRoute = parent::signedRoute($internalRoute, $parameters, $expiration, $absolute);
        $query = parse_url($signedRoute, PHP_URL_QUERY);
        parse_str($query, $queryArray);

        return route($spaRoute, $queryArray);
    }
}
