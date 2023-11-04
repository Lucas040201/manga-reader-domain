<?php

namespace Core\Domain\Users\UseCases;

use Core\Domain\Users\Entity\UserEntity;
use Core\Domain\Users\Exceptions\EmailAlreadyExists;
use Core\Domain\Users\Exceptions\UsernameAlreadyExists;
use Core\Domain\Users\Ports\In\InsertUserInputPort;
use Core\Domain\Users\Ports\Out\FindUserByEmailOutputPort;
use Core\Domain\Users\Ports\Out\FindUserByUsernameOutputPort;
use Core\Domain\Users\Ports\Out\InsertUserOutputPort;

class InsertUserUseCase implements InsertUserInputPort
{
    public function __construct(
        private readonly InsertUserOutputPort $insertUserOutputPort,
        private readonly FindUserByEmailOutputPort $findUserByEmailOutputPort,
        private readonly FindUserByUsernameOutputPort $findUserByUsernameOutputPort
    )
    {
    }

    /**
     * @throws EmailAlreadyExists|UsernameAlreadyExists
     */
    public function create(UserEntity $user): UserEntity {
        $currentUser = $this->findUserByEmailOutputPort->findUserByEmail($user->getEmail());
        if(!empty($currentUser)) {
            throw new EmailAlreadyExists();
        }

        $currentUser = $this->findUserByUsernameOutputPort->findUserByUsername($user->getUsername());

        if(!empty($currentUser)) {
            throw new UsernameAlreadyExists();
        }

        return $this->insertUserOutputPort->create($user);
    }
}
