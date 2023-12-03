<?php

namespace Core\Domain\Users\Entity;

use Core\Domain\Base\Interfaces\EntityInterface;
use DateTime;
class PasswordRecoveryEntity implements EntityInterface
{
    public function __construct(
        private ?int $id = null,
        private ?int $userId = null,
        private ?string $token = '',
        private ?string $expiration = null,
        private ?bool $used = false,
        private ?string $createdAt = null,
        private ?string $updatedAt = null
    )
    {
        $this->setToken();
        $this->setExpiration();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return PasswordRecoveryEntity
     */
    public function setId(?int $id): PasswordRecoveryEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     * @return PasswordRecoveryEntity
     */
    public function setUserId(?int $userId): PasswordRecoveryEntity
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     * @return PasswordRecoveryEntity
     */
    public function setToken(?string $token = ''): PasswordRecoveryEntity
    {
        if (empty($token)) {
            $currentDateTime = new DateTime();
            $currentDatetimeStamp = $currentDateTime->getTimestamp();
            $this->token = md5("{$this->getId()}{$this->getExpiration()}$currentDatetimeStamp");
        } else {
            $this->token = $token;
        }
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpiration(): ?string
    {
        return $this->expiration;
    }

    /**
     * @param string|null $expiration
     * @return PasswordRecoveryEntity
     */
    public function setExpiration(?string $expiration = ''): PasswordRecoveryEntity
    {
        if (empty($expiration)) {
            $currentDateTime = new DateTime();
            $currentDatetimeStamp = $currentDateTime->getTimestamp();
            $this->expiration = date( "Y-M-d H:i:s", strtotime($currentDatetimeStamp) + (5 * 60));
        } else {
            $this->expiration = $expiration;
        }
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getUsed(): ?bool
    {
        return $this->used;
    }

    /**
     * @param bool|null $used
     * @return PasswordRecoveryEntity
     */
    public function setUsed(?bool $used): PasswordRecoveryEntity
    {
        $this->used = $used;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param string|null $createdAt
     * @return PasswordRecoveryEntity
     */
    public function setCreatedAt(?string $createdAt): PasswordRecoveryEntity
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param string|null $updatedAt
     * @return PasswordRecoveryEntity
     */
    public function setUpdatedAt(?string $updatedAt): PasswordRecoveryEntity
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
