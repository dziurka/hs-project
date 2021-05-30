<?php

namespace App\API\Auth\Controllers;

use App\API\Auth\Requests\LoginRequest;
use App\API\Auth\ViewModels\AuthUserViewModel;
use App\API\Controller;
use Domain\Auth\Actions\ILoginAction;
use Domain\Auth\DataTransferObjects\LoginDTO;

class LoginController extends Controller
{
    public function __construct(private ILoginAction $loginAction) { }

    public function login(LoginRequest $request): AuthUserViewModel
    {
        return new AuthUserViewModel(
            $this->loginAction->execute(LoginDTO::fromRequest($request))
        );
    }
}
