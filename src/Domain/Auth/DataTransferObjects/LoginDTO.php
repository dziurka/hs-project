<?php

namespace Domain\Auth\DataTransferObjects;

use App\API\Auth\Requests\LoginRequest;
use Support\DataTransferObjects\DataTransferObject;

class LoginDTO extends DataTransferObject
{

    public function __construct(
        public string $email,
        public string $password,
        public ?string $ip
    )
    {
        //
    }

    public static function fromRequest(LoginRequest $loginRequest): self
    {
        return new self(
            email: $loginRequest->input('email'),
            password: $loginRequest->input('password'),
            ip: $loginRequest->ip()
        );
    }
}
