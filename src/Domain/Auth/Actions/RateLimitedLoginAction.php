<?php

namespace Domain\Auth\Actions;

use Domain\Auth\DataTransferObjects\LoginDTO;
use Domain\Auth\Enums\ThrottleKeysEnum;
use Domain\Auth\Exceptions\LoginLimitReachedException;
use Domain\Users\Models\User;
use Illuminate\Cache\RateLimiter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Support\Actions\AbstractActionRateLimiterDecorator;

class RateLimitedLoginAction extends AbstractActionRateLimiterDecorator
    implements ILoginAction
{
    protected int $decaySeconds = 60;
    protected int $attemptLimit = 5;
    protected string $exceptionClass = LoginLimitReachedException::class;

    private LoginDTO $loginDTO;

    public function __construct(
        private LoginAction $loginAction,
        RateLimiter $rateLimiter
    ) {
        parent::__construct($this->loginAction, $rateLimiter);
    }

    public function execute(LoginDTO $loginDTO): User|Model
    {
        $this->loginDTO = $loginDTO;

        $this->check();

        $user = $this->loginAction->execute($loginDTO);

        $this->clear();

        return $user;
    }

    protected function getThrottleKey(): string
    {
        return sprintf(ThrottleKeysEnum::login()->value, Str::lower($this->loginDTO->email), $this->loginDTO->ip);
    }
}
