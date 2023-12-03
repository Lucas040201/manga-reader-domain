<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\UserEntity;

interface FindUserByTokenOutputPort
{
    public function findUser(string $token): UserEntity | null;

}
