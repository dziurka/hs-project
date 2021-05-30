<?php

namespace Domain\Auth\Exceptions;

use Support\Exceptions\HttpApiException;
use Support\Responses\Response;

class IncorrectLoginDataException extends HttpApiException {

    protected int $statusCode = Response::HTTP_UNAUTHORIZED;
}
