<?php

namespace Domain\Auth\DataTransferObjects;

use App\API\Auth\Requests\RegisterRequest;
use Support\DataTransferObjects\DataTransferObject;

class RegisterDTO extends DataTransferObject
{

    public function __construct(
        public string $email,
        public string $password,
        public string $name,
    )
    {
        //
    }

    public static function fromRequest(RegisterRequest $registerRequest): self
    {
        return new self(
            email: $registerRequest->input('email'),
            password: $registerRequest->input('password'),
            name: $registerRequest->input('name'),
        );
    }
}
