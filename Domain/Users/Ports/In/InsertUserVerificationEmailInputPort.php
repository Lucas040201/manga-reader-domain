<?php

namespace Core\Domain\Users\Ports\In;

use Core\Domain\Users\Entity\UserEntity;
use Core\Domain\Users\Entity\UserVerificationEmailEntity;

interface InsertUserVerificationEmailInputPort
{
    public function create(UserEntity $user): UserVerificationEmailEntity;
}
