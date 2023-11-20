<?php

namespace Core\Domain\Users\UseCases;

use Core\Domain\Users\Entity\UserEntity;
use Core\Domain\Users\Entity\UserVerificationEmailEntity;
use Core\Domain\Users\Ports\In\InsertUserVerificationEmailInputPort;
use Core\Domain\Users\Ports\Out\InsertUserVerificationEmailOutputPort;
use DateTime;
use Exception;
class InsertUserVerificationEmailUseCase implements InsertUserVerificationEmailInputPort
{
    public function __construct(
        private readonly InsertUserVerificationEmailOutputPort $insertUserVerificationEmailOutputPort
    )
    {
    }

    /**
     * @throws Exception
     */
    public function create(UserEntity $user): UserVerificationEmailEntity
    {
        $verification = new UserVerificationEmailEntity();
        $verification->setUserId($user->getId());
        $currentDateTime = new DateTime();
        $currentDatetimeStamp = $currentDateTime->getTimestamp();
        $token = md5("{$user->getName()}{$user->getCreatedAt()}$currentDatetimeStamp");
        $verification->setToken($token);
        $validUtilDateTime = new DateTime(date('H:i:s', strtotime('+15 minutes')));
        $verification->setValidUntil(date('Y-m-d H:i:s', $validUtilDateTime->getTimestamp()));
        $currentVerification = $this->insertUserVerificationEmailOutputPort->create($verification);
        return $currentVerification;
    }
}
