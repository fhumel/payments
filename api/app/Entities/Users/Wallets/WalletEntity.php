<?php

namespace App\Entities\Users\Wallets;

class WalletEntity
{
    /** @var integer */
    private ?int $id = null;

    /** @var float */
    private float $money;

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
    public function setId(?string $id): WalletEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @param float|null $money
     * @return UserEntity
     */
    public function setMoney(?float $money): WalletEntity
    {
        $this->money = $money;
        return $this;
    }
}
