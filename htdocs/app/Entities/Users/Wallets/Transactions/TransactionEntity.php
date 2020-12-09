<?php

namespace App\Entities\Users\Wallets\Transactions;

class TransactionEntity
{
    /** @var integer */
    private ?int $id = null;

    /** @var integer */
    private int $payer;

    /** @var integer */
    private int $payee;

    /** @var float */
    private int $value;

    /**
     * @return integer
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return integer
     */
    public function getPayer(): int
    {
        return $this->payer;
    }

    /**
     * @param integer $payer
     */
    public function setPayer(int $payer): TransactionEntity
    {
        $this->payer = $payer;
    }

    /**
     * @return integer
     */
    public function getPayee(): int
    {
        return $this->payee;
    }

    /**
     * @param integer $payee
     */
    public function setPayee(int $payee): TransactionEntity
    {
        $this->payee = $payee;
    }

    /**
     * @return float
     */
    public function getvalue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValur(int $value): TransactionEntity
    {
        $this->value = $value;
    }

}
