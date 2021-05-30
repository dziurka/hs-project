<?php

namespace Domain\Auth\Actions;

use Illuminate\Auth\AuthManager;
use Illuminate\Session\Store;

class LogoutUserAction implements ILogoutUserAction
{
    public function __construct(
        private AuthManager $auth,
        private Store $session
    ) { }

    public function execute(): void
    {
        $this->auth->guard()->logout();
        $this->session->regenerate();
    }
}
