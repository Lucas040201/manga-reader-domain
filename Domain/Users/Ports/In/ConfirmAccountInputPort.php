<?php

namespace Core\Domain\Users\Ports\In;

interface ConfirmAccountInputPort
{
    public function confirm(string $token);
}
