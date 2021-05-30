<?php

namespace Domain\Auth\Exceptions;

use Support\Exceptions\ThrottlingLimitReachedException;
use Support\Responses\Response;

class UserEmailAlreadyTaken extends ThrottlingLimitReachedException {

    protected int $statusCode = Response::HTTP_CONFLICT;
    protected ?string $title = 'This email was already taken';
}
