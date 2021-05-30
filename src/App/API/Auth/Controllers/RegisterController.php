<?php

namespace App\API\Auth\Controllers;

use App\API\Auth\Requests\RegisterRequest;
use App\API\Auth\ViewModels\AuthUserViewModel;
use App\API\Controller;
use Domain\Auth\Actions\ISignUpAction;
use Domain\Auth\DataTransferObjects\RegisterDTO;

class RegisterController extends Controller
{
    public function __construct(private ISignUpAction $signUpAction) { }

    public function register(RegisterRequest $request): AuthUserViewModel
    {
        return new AuthUserViewModel(
            $this->signUpAction->execute(RegisterDTO::fromRequest($request))
        );
    }
}
