<?php

namespace Support\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Validation\UnauthorizedException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            throw new UnauthorizedException();
        }
    }
}
