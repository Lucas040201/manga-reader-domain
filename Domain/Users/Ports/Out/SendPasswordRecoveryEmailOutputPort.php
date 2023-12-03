<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\PasswordRecoveryEntity;
use Core\Domain\Users\Entity\UserEntity;

interface SendPasswordRecoveryEmailOutputPort
{
    public function send(PasswordRecoveryEntity $passwordRecovery, UserEntity $user): void;
}
