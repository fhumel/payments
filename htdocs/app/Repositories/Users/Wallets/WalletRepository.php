<?php

namespace App\Repositories\Users\Wallets;

use App\Contracts\Users\Wallets\Mappers\WalletMapperInterface;
use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Entities\Users\Wallets\WalletEntity;
use App\Models\Users\Wallets\Wallet;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class WalletRepository implements WalletRepositoryInterface
{

    /** @var \App\Models\Users\Wallets\Wallet $walletModel */
    private $walletModel;

    /** @var \Illuminate\Database\Eloquent\Builder */
    private $queryBuilder;

    /** @var \App\Contracts\Users\Mappers\Wallets\WalletMapperInterface */
    private $walletMapper;

    /**
     * UserRepository constructor.
     * @param \App\Models\Users\Wallets\Wallet                                 $walletModel
     * @param \App\Contracts\Users\Mappers\Wallets\WalletMapperInterface  $walletMapper
     */
    public function __construct(WalletMapperInterface $walletMapper, Wallet $walletModel)
    {
        $this->walletMapper = $walletMapper;
        $this->walletModel = $walletModel;
        $this->queryBuilder = $this->walletModel->newQuery();
    }

    /**
     * @inheritDoc
     */
    public function deposit(array $dados): WalletEntity
    {
        $wallet = Wallet::find($dados['id']);

        $wallet = $this->walletMapper->map($wallet->toArray());

        $id = $wallet->getId();
        $money = $wallet->getMoney();

        $moneyAdd = number_format($dados['money'], 2);

        $amount = $money + $moneyAdd;

        DB::table('wallets')
            ->where('id', $id)
            ->update(['money' => $amount]);


        return $wallet;
    }

    /**
     * @inheritDoc
     */
    public function withdrawn(array $dados): Wallet
    {

        $dados = $this->walletMapper->map($dados);

        $id = $dados->getId();
        $money = $dados->getMoney();
        $moneyRemove = number_format($money, 2);

        $wallet = Wallet::find($id);
        $moneyWallet = number_format($wallet->money, 2);

        if ($moneyWallet < $moneyRemove ) {
            abort(
                \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST,
                'Voce não possui saldo para tranferir.'
            );
        }

        $amount = $moneyWallet - $moneyRemove;

        DB::table('wallets')
            ->where('id', $id)
            ->update(['money' => $amount]);


        return $wallet;
    }

    /**
     * @inheritDoc
     */
    public function balance($id): array
    {

        $wallet = Wallet::find($id['id']);

        return $wallet->toArray();
    }

    /**
     * @inheritDoc
     */
    public function create(array $dados): Wallet
    {

        $wallet = Wallet::create($dados);

        if (!$wallet) {
            throw new \Exception();
        }

        return $wallet;
    }
}
