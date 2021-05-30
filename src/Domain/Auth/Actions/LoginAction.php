<?php

namespace Domain\Auth\Actions;

use Domain\Auth\DataTransferObjects\LoginDTO;
use Domain\Auth\Exceptions\IncorrectLoginDataException;
use Domain\Users\Models\User;
use Domain\Users\Repositories\IUserRepository;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Session\Store;
use Support\Actions\IActionRateLimited;

class LoginAction implements IActionRateLimited, ILoginAction
{
    public function __construct(
        private Store $session,
        private AuthManager $auth,
        private IUserRepository $userRepository
    ) { }

    public function execute(LoginDTO $loginDTO): User|Model
    {
        if (!$this->attemptLogin($loginDTO)) {
            throw new IncorrectLoginDataException();
        }

        $this->session->regenerate();

        return $this->userRepository->findByEmail($loginDTO->email);
    }

    private function attemptLogin(LoginDTO $loginDTO): bool
    {
        return $this->auth->guard('web')->attempt(
            [
                'email' => $loginDTO->email,
                'password' => $loginDTO->password
            ],
            remember: true
        );
    }
}
