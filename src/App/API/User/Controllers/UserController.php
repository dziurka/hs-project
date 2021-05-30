<?php

namespace App\API\User\Controllers;

use App\API\Controller;
use App\API\User\ViewModels\UserViewModel;
use Support\Requests\AuthCheckRequest;

class UserController extends Controller
{
    public function show(AuthCheckRequest $request): UserViewModel
    {
        return new UserViewModel($request->user());
    }
}
