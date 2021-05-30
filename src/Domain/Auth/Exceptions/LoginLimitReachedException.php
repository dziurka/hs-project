<?php

namespace Domain\Auth\Exceptions;

use Support\Exceptions\ThrottlingLimitReachedException;
use Support\Responses\Response;

class LoginLimitReachedException extends ThrottlingLimitReachedException {

    protected int $statusCode = Response::HTTP_UNAUTHORIZED;
}
