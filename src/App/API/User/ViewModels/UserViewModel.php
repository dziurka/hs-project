<?php

namespace App\API\User\ViewModels;

use App\API\User\Resources\UserResource;
use Domain\Users\Models\User;
use Support\ViewModels\ViewModel;

class UserViewModel extends ViewModel
{
    public function __construct(private User $user) { }

    public function user(): UserResource
    {
        return UserResource::make($this->user);
    }
}
