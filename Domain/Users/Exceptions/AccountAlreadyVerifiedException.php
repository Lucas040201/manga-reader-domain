<?php

namespace Core\Domain\Users\Exceptions;

use Exception;
use Throwable;

class AccountAlreadyVerifiedException extends Exception
{
    public function __construct(string $message = "The account has already been verified.", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
