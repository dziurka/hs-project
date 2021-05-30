<?php

namespace Domain\Auth\Actions;

use Domain\Auth\DataTransferObjects\LoginDTO;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

interface ILoginAction
{
    public function execute(LoginDTO $loginDTO): User|Model;
}
