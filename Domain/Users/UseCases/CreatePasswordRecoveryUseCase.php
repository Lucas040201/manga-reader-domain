<?php

namespace Core\Domain\Users\UseCases;

use Core\Domain\Users\Entity\PasswordRecoveryEntity;
use Core\Domain\Users\Exceptions\UserNotFoundException;
use Core\Domain\Users\Ports\In\CreatePasswordRecoveryInputPort;
use Core\Domain\Users\Ports\Out\CreatePasswordRecoveryOutputPort;
use Core\Domain\Users\Ports\Out\FindUserByEmailOutputPort;
use Core\Domain\Users\Ports\Out\SendPasswordRecoveryEmailOutputPort;

class CreatePasswordRecoveryUseCase implements CreatePasswordRecoveryInputPort
{
    public function __construct(
        private readonly FindUserByEmailOutputPort $findUserByEmailOutputPort,
        private readonly CreatePasswordRecoveryOutputPort $createPasswordRecoveryOutputPort,
        private readonly SendPasswordRecoveryEmailOutputPort $sendPasswordRecoveryEmailOutputPort
    )
    {
    }

    /**
     * @throws UserNotFoundException
     */
    public function create(string $email): PasswordRecoveryEntity
    {
        $user = $this->findUserByEmailOutputPort->findUserByEmail($email);
        if(empty($user)) {
            throw new UserNotFoundException();
        }

        $passwordRecovery = new PasswordRecoveryEntity();
        $passwordRecovery->setUserId($user->getId());

        $passwordRecovery = $this->createPasswordRecoveryOutputPort->create($passwordRecovery);

        $this->sendPasswordRecoveryEmailOutputPort->send($passwordRecovery, $user);

        return $passwordRecovery;
    }
}
