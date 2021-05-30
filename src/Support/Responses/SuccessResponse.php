<?php

namespace Support\Responses;

class SuccessResponse extends Response
{
    public function __construct(
        private string $message = 'ok',
        private mixed $payload = null,
        int $status = Response::HTTP_OK,
        array $headers = [],
        int $options = 0
    )
    {
        parent::__construct($this->message, $status, $this->payload, $headers, $options);
    }
}
