<?php

namespace Domain\Auth\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self login()
 * @method static self sendVerificationEmail()
 */
class ThrottleKeysEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'login' => 'login_throttle_%s_%s',
            'sendVerificationEmail' => 'send_verification_email_%s'
        ];
    }
}
