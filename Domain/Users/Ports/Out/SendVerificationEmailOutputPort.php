<?php

namespace Core\Domain\Users\Ports\Out;

use Core\Domain\Users\Entity\UserEntity;

interface SendVerificationEmailOutputPort
{
    public function sendEmail(UserEntity $user);
}
