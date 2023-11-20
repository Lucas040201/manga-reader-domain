<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\UserEntity;
use Core\Domain\Users\Entity\UserVerificationEmailEntity;

interface SendVerificationEmailOutputPort
{
    public function sendEmail(UserEntity $user, UserVerificationEmailEntity $userVerificationEmailEntity);
}
