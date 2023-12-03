<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\PasswordRecoveryEntity;

interface FindPasswordRecoveryByTokenOutputPort
{
    public function find(string $token): PasswordRecoveryEntity|null;
}
