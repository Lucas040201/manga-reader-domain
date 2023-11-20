<?php

namespace Core\Domain\Users\Entity;

use Core\Domain\Base\Interfaces\EntityInterface;

class UserVerificationEmailEntity implements EntityInterface
{
    public function __construct(
        private ?int $id = null,
        private ?string $token = null,
        private ?int $userId = null,
        private ?string $validUntil = null,
        private ?string $createdAt = null,
        private ?string $updatedAt = null
    )
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
    }

    public function getValidUntil(): ?string
    {
        return $this->validUntil;
    }

    public function setValidUntil(?string $validUntil): void
    {
        $this->validUntil = $validUntil;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
