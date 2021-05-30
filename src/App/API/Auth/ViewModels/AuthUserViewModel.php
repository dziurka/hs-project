<?php

namespace App\API\Auth\ViewModels;

use App\API\Auth\Resources\AuthUserResource;
use Domain\Users\Models\User;
use Support\ViewModels\ViewModel;

class AuthUserViewModel extends ViewModel
{
    public function __construct(private User $user) { }

    public function user(): AuthUserResource
    {
        return AuthUserResource::make($this->user);
    }
}
