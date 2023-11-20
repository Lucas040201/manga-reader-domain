<?php

namespace Core\Domain\Users\UseCases;

use Core\Domain\Users\Entity\UserEntity;
use Core\Domain\Users\Exceptions\EmailAlreadyExists;
use Core\Domain\Users\Exceptions\UsernameAlreadyExists;
use Core\Domain\Users\Ports\In\InsertUserInputPort;
use Core\Domain\Users\Ports\In\InsertUserVerificationEmailInputPort;
use Core\Domain\Users\Ports\Out\FindUserByEmailOutputPort;
use Core\Domain\Users\Ports\Out\FindUserByUsernameOutputPort;
use Core\Domain\Users\Ports\Out\InsertUserOutputPort;
use Core\Domain\Users\Ports\Out\SendVerificationEmailOutputPort;

class InsertUserUseCase implements InsertUserInputPort
{
    public function __construct(
        private readonly InsertUserOutputPort $insertUserOutputPort,
        private readonly FindUserByEmailOutputPort $findUserByEmailOutputPort,
        private readonly FindUserByUsernameOutputPort $findUserByUsernameOutputPort,
        private readonly InsertUserVerificationEmailInputPort $insertUserVerificationEmailInputPort,
        private readonly SendVerificationEmailOutputPort $sendVerificationEmailOutputPort
    )
    {
    }

    /**
     * @throws EmailAlreadyExists|UsernameAlreadyExists
     */
    public function create(UserEntity $user): UserEntity
    {
        $currentUser = $this->findUserByEmailOutputPort->findUserByEmail($user->getEmail());
        if(!empty($currentUser)) {
            throw new EmailAlreadyExists();
        }

        $currentUser = $this->findUserByUsernameOutputPort->findUserByUsername($user->getUsername());

        if(!empty($currentUser)) {
            throw new UsernameAlreadyExists();
        }

        $persistedUser = $this->insertUserOutputPort->create($user);

        $userVerification = $this->insertUserVerificationEmailInputPort->create($persistedUser);
        $this->sendVerificationEmailOutputPort->sendEmail($persistedUser, $userVerification);

        return $persistedUser;
    }
}
