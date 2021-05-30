<?php

namespace Support\Actions;

use Illuminate\Cache\RateLimiter;
use Support\Exceptions\ThrottlingLimitReachedException;

abstract class AbstractActionRateLimiterDecorator
{
    protected int $decaySeconds = 60 * 5;
    protected int $attemptLimit = 1;
    protected string $exceptionClass = ThrottlingLimitReachedException::class;

    public function __construct(
        private IActionRateLimited $actionRateLimited, protected RateLimiter $rateLimiter
    )
    {
        //
    }

    protected abstract function getThrottleKey(): string;

    protected function check(): void
    {
        if ($this->isLimitReached()) {
            throw $this->getThrottleException(
                $this->rateLimiter->availableIn($this->getThrottleKey())
            );
        }

        $this->throttlingHit();
    }

    protected function clear(): void
    {
        $this->rateLimiter->clear($this->getThrottleKey());
    }

    protected function getThrottleDecaySeconds(): int
    {
        return $this->decaySeconds;
    }

    protected function getThrottleAttemptLimit(): int
    {
        return $this->attemptLimit;
    }

    protected function getThrottleException(int $seconds): ThrottlingLimitReachedException
    {
        return new $this->exceptionClass([
            'seconds' => $seconds
        ]);
    }

    private function isLimitReached(): bool
    {
        return $this->rateLimiter->tooManyAttempts(
            $this->getThrottleKey(),
            $this->getThrottleAttemptLimit()
        );
    }

    private function throttlingHit(): void
    {
        $this->rateLimiter->hit(
            $this->getThrottleKey(),
            $this->getThrottleDecaySeconds()
        );
    }
}
