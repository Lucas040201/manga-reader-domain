<?php

namespace Core\Domain\Users\Entity;


use Core\Domain\Base\Interfaces\EntityInterface;

class UserEntity implements EntityInterface
{

    public function __construct(
    private ?int $id = null,
    private ?string $uuid = null,
    private ?string $name = null,
    private ?string $surname = null,
    private ?string $username = null,
    private ?string $email = null,
    private ?string $password = null,
    private ?string $phoneNumber = null,
    private ?bool $emailConfirmation = null,
    private ?string $profilePicture = null,
    private ?string $createdAt = null,
    private ?string $updatedAt = null
    )
    {
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
     * @return UserEntity
     */
    public function setId(?int $id): UserEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     * @return UserEntity
     */
    public function setUuid(?string $uuid): UserEntity
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return UserEntity
     */
    public function setName(?string $name): UserEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     * @return UserEntity
     */
    public function setSurname(?string $surname): UserEntity
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return UserEntity
     */
    public function setUsername(?string $username): UserEntity
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return UserEntity
     */
    public function setEmail(?string $email): UserEntity
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return UserEntity
     */
    public function setPassword(?string $password): UserEntity
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     * @return UserEntity
     */
    public function setPhoneNumber(?string $phoneNumber): UserEntity
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEmailConfirmation(): ?bool
    {
        return $this->emailConfirmation;
    }

    /**
     * @param bool|null $emailConfirmation
     * @return UserEntity
     */
    public function setEmailConfirmation(?bool $emailConfirmation): UserEntity
    {
        $this->emailConfirmation = $emailConfirmation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    /**
     * @param string|null $profilePicture
     * @return UserEntity
     */
    public function setProfilePicture(?string $profilePicture): UserEntity
    {
        $this->profilePicture = $profilePicture;
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
     * @return UserEntity
     */
    public function setCreatedAt(?string $createdAt): UserEntity
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
     * @return UserEntity
     */
    public function setUpdatedAt(?string $updatedAt): UserEntity
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

}
