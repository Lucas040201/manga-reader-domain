<?php

namespace Core\Domain\Users\UseCases;

use Core\Domain\Users\Entity\UserEntity;
use Core\Domain\Users\Exceptions\EmailAlreadyExistsException;
use Core\Domain\Users\Exceptions\UsernameAlreadyExistsException;
use Core\Domain\Users\Ports\In\CreateUserInputPort;
use Core\Domain\Users\Ports\Out\FindUserByEmailOutputPort;
use Core\Domain\Users\Ports\Out\FindUserByUsernameOutputPort;
use Core\Domain\Users\Ports\Out\InsertUserOutputPort;
use Core\Domain\Users\Ports\Out\SendVerificationEmailOutputPort;

class CreateUserUseCase implements CreateUserInputPort
{
    public function __construct(
        private readonly InsertUserOutputPort $insertUserOutputPort,
        private readonly FindUserByEmailOutputPort $findUserByEmailOutputPort,
        private readonly FindUserByUsernameOutputPort $findUserByUsernameOutputPort,
        private readonly SendVerificationEmailOutputPort $sendVerificationEmailOutputPort
    )
    {
    }

    /**
     * @throws EmailAlreadyExistsException|UsernameAlreadyExistsException
     */
    public function create(UserEntity $user): UserEntity
    {
        $currentUser = $this->findUserByEmailOutputPort->findUserByEmail($user->getEmail());
        if(!empty($currentUser)) {
            throw new EmailAlreadyExistsException();
        }

        $currentUser = $this->findUserByUsernameOutputPort->findUserByUsername($user->getUsername());

        if(!empty($currentUser)) {
            throw new UsernameAlreadyExistsException();
        }

        $persistedUser = $this->insertUserOutputPort->create($user);

        $this->sendVerificationEmailOutputPort->sendEmail($persistedUser);

        return $persistedUser;
    }
}
