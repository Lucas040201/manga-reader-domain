<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\UserEntity;

interface FindUserByEmailOutputPort
{
    public function findUserByEmail(string $email): UserEntity|null;
}
