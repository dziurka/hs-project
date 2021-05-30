<?php

namespace Support\Responses;

use Illuminate\Http\JsonResponse;

class Response extends JsonResponse
{
    public function __construct(
        private string $message,
        int $status,
        private mixed $payload = null,
        array $headers = [],
        int $options = 0
    )
    {
        parent::__construct($this->wrapData(), $status, $headers, $options);
    }

    protected function wrapData(): array
    {
        return [
            'message' => $this->message,
            'payload' => $this->payload
        ];
    }
}
