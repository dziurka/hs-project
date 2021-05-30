<?php

namespace Support\Exceptions;

use Support\Responses\Response;

class ThrottlingLimitReachedException extends HttpApiException {
    protected int $statusCode = Response::HTTP_TOO_MANY_REQUESTS;
}
