<?php

namespace App\Repositories\Users\Wallets\Transactions;

use App\Contracts\Users\Wallets\Transactions\Repositories\TransactionRepositoryInterface;
use App\Mappers\Transactions\TransactionMapper;
use App\Mappers\Transactions\TransactionMapperInterface;
use App\Models\Users\Wallets\Transactions\Transaction;
use Illuminate\Support\Collection;

class TransactionRepository implements TransactionRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function list(): array
    {

        $transactions = Transaction::all();

        return $transactions->toArray();
    }

    /**
     * @inheritDoc
     */
    public function pay(array $dados): Transaction
    {
        $transaction = Transaction::create($dados);

        if (!$transaction) {
            throw new \Exception();
        }

        return $transaction;
    }

}
