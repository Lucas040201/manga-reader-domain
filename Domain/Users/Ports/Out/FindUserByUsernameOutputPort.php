<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\UserEntity;

interface FindUserByUsernameOutputPort
{
    public function findUserByUsername(string $username): UserEntity|null;
}
