<?php

namespace Core\Domain\Users\UseCases;

use Core\Domain\Users\Enum\UserStatusEnum;
use Core\Domain\Users\Exceptions\AccountAlreadyVerifiedException;
use Core\Domain\Users\Exceptions\UserNotFoundException;
use Core\Domain\Users\Ports\In\ConfirmAccountInputPort;
use Core\Domain\Users\Ports\Out\FindUserByTokenOutputPort;
use Core\Domain\Users\Ports\Out\UpdateUserOutputPort;

class ConfirmAccountUseCase implements ConfirmAccountInputPort
{

    public function __construct(
        private readonly FindUserByTokenOutputPort $findUserByTokenOutputPort,
        private readonly UpdateUserOutputPort $updateUserOutputPort
    )
    {
    }

    /**
     * @throws UserNotFoundException
     * @throws AccountAlreadyVerifiedException
     */
    public function confirm(string $token): void
    {
        $user = $this->findUserByTokenOutputPort->findUser($token);
        if(empty($user)) {
            throw new UserNotFoundException();
        }
        $user->setStatus(UserStatusEnum::active->value);
        $this->updateUserOutputPort->update($user);
    }
}
