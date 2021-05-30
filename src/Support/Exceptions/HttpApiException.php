<?php

namespace Support\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class HttpApiException extends HttpException
{
    use ApiThrowableTrait;

    public function __construct(mixed $payload = null)
    {
        $this->dynamicPayload = $payload;

        parent::__construct($this->httpCode()->value, $this->title());
    }
}
