<?php

namespace Support\Exceptions;

use Exception;

abstract class ApiException extends Exception
{
    use ApiThrowableTrait;

    public function __construct(mixed $payload = null)
    {
        $this->dynamicPayload = $payload;

        parent::__construct($this->title(), $this->httpCode()->value);
    }
}
