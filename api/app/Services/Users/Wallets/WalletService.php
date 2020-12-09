<?php

namespace App\Services\Users\Wallets;

use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Contracts\Users\Wallets\Services\WalletServiceInterface;
use App\Entities\Users\Wallets\WalletEntity;
use App\Models\Users\Wallets\Wallet;
use Illuminate\Support\Collection;

class WalletService implements WalletServiceInterface
{


    /** @var \App\Repositories\Wallets\WalletRepositoryInterface */
    private $walletRepository;

    /**
     * TransactionService constructor.
     *
     * @param \App\Repositories\Wallets\WalletRepositoryInterface $walletRepository
     */
    public function __construct(WalletRepositoryInterface $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    /**
     * @inheritDoc
     */
    public function balance($dados): array
    {
        return $this->walletRepository->balance($dados);
    }

    /**
     * @inheritDoc
     */
    public function deposit($dados): WalletEntity
    {
        return $this->walletRepository->deposit($dados);
    }
}
