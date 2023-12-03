<?php

namespace Core\Domain\Users\Ports\In;

use Core\Domain\Users\Entity\UserEntity;

interface CreateUserInputPort
{
    public function create(UserEntity $user): UserEntity;
}
