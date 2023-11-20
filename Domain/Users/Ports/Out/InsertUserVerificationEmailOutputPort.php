<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\UserVerificationEmailEntity;

interface InsertUserVerificationEmailOutputPort
{
    public function create(UserVerificationEmailEntity $userVerificationEmailEntity): UserVerificationEmailEntity;
}
