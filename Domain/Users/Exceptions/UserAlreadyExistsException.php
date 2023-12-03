<?php

namespace Core\Domain\Users\Exceptions;
use Exception;
use Throwable;

class UserAlreadyExists extends Exception
{
    public function __construct(string $message = "", int $code = 409, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
