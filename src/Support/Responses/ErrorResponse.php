<?php

namespace Support\Responses;

class ErrorResponse extends Response
{
    public function __construct(
        private string $message = 'Error',
        private mixed $payload = null,
        int $status = Response::HTTP_BAD_REQUEST,
        array $headers = [],
        int $options = 0
    )
    {
        parent::__construct($this->message, $status, $this->payload, $headers, $options);
    }
}
