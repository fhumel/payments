<?php

namespace App\Repositories\Users\Wallets\Transactions\Factories;


use App\Contracts\Users\Wallets\Transactions\Mappers\TransactionMapperInterface;
use App\Models\Users\Wallets\Transactions\Transaction;
use App\Repositories\Users\Wallets\Transactions\TransactionRepository;

class TransactionRepositoryFactory
{
    /**
     * @return TransactionRepository
     */
    public function __invoke()
    {
        /** @var \Api\Mappers\Users $mapper */
        $mapper = app(TransactionMapperInterface::class);

        /** @var User $transactionModel */
        $transactionModel = app(Transaction::class);

        return new TransactionRepository(
            $mapper,
            $transactionModel
        );
    }
}
