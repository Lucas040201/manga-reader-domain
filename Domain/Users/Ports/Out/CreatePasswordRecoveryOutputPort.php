<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\PasswordRecoveryEntity;

interface CreatePasswordRecoveryOutputPort
{
    public function create(PasswordRecoveryEntity $passwordRecovery): PasswordRecoveryEntity;
}
