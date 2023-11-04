<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\UserEntity;

interface InsertUserOutputPort
{
    public function create(UserEntity $user): UserEntity;
}
