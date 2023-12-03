<?php

namespace Core\Domain\Users\Exceptions;

use Exception;
use Throwable;

class PasswordRecoveryRequestNotFoundException extends Exception
{
    public function __construct(string $message = "Password recovery request not found.", int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
