<?php

namespace Tests\Domain\Auth\Factories;

use Domain\Auth\DataTransferObjects\RegisterDTO;
use Support\TestFactories\ObjectFactory;

class RegisterDTOObjectFactory extends ObjectFactory
{
    public function create(array $parameters = []): RegisterDTO
    {
        $registerDtoParams = array_merge([
            'email' => faker()->email,
            'password' => faker()->password(8),
            'name' => faker()->name
        ], $parameters);

        return new RegisterDTO(...$registerDtoParams);
    }
}
