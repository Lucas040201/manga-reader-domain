<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\UserEntity;

interface UpdateUserOutputPort
{
    public function update(UserEntity $user): bool;
}
