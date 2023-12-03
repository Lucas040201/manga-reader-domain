<?php

namespace Core\Domain\Users\Enum;

enum UserStatusEnum: int
{
    case pending = 1;
    case active = 2;
}
