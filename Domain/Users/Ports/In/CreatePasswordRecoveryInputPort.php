<?php

namespace Core\Domain\Users\Ports\In;

use Core\Domain\Users\Entity\PasswordRecoveryEntity;

interface CreatePasswordRecoveryInputPort
{
    public function create(string $email): PasswordRecoveryEntity;
}
