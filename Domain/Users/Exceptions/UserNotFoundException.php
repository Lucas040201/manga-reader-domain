<?php

namespace Core\Domain\Users\Exceptions;
use Exception;
use Throwable;

class UserNotFoundException extends Exception
{
    public function __construct(string $message = "User Not Found!", int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
