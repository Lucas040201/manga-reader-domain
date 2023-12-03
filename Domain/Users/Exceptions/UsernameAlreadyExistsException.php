<?php

namespace Core\Domain\Users\Exceptions;

use Exception;
use Throwable;

class UsernameAlreadyExistsException extends Exception
{
    public function __construct(string $message = "Username Already Exists", int $code = 409, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
