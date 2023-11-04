<?php

namespace Core\Domain\Users\Ports\In;

use Core\Domain\Users\Entity\UserEntity;

interface InsertUserInputPort
{
    public function create(UserEntity $user): UserEntity;
}
