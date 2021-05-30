<?php

namespace Domain\Auth\Actions;

use Domain\Auth\DataTransferObjects\RegisterDTO;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

interface ISignUpAction
{
    public function execute(RegisterDTO $registerDTO): User|Model;
}
