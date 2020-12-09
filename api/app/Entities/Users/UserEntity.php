<?php

namespace App\Entities\Users;

class UserEntity
{
    /** @var integer */
    private ?int $id = null;

    /** @var string */
    private ?string $email = null;

    /** @var integer */
    private ?int $walletId = null;

    /** @var string */
    private ?string $password = null;

    /** @var string */
    private ?string $cpf = null;

    /** @var string */
    private ?string $name = null;

    /** @var integer */
    private ?string $type = null;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserEntity
     */
    public function setName(string $name): UserEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return integer
     */
    public function getType(): integer
    {
        return $this->type;
    }

    /**
     * @param integer $type
     * @return UserEntity
     */
    public function setType(string $type): UserEntity
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param string|null $id
     * @return UserEntity
     */
    public function setId(?string $id): UserEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserEntity
     */
    public function setEmail(string $email): UserEntity
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getWalletId(): int
    {
        return $this->walletId;
    }

    /**
     * @param int $walletId
     * @return UserEntity
     */
    public function setWalletId(int $walletId): UserEntity
    {
        $this->walletId = $walletId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UserEntity
     */
    public function setPassword(string $password): UserEntity
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $name
     * @return UserEntity
     */
    public function setCpf(string $cpf): UserEntity
    {
        $this->cpf = $cpf;
        return $this;
    }
}
