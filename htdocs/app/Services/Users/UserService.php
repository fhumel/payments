<?php

namespace App\Services\Users;

use App\Contracts\Users\Repositories\UserRepositoryInterface;
use App\Contracts\Users\Services\UserServiceInterface;
use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Entities\Users\UserEntity;
use App\Models\Users\User;
use Illuminate\Support\Collection;

class UserService implements UserServiceInterface
{

    /** @var \App\Repositories\Users\UserRepositoryInterface */
    private $userRepository;
    /**
     * @var \App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface|\App\Repositories\Users\Wallets\WalletRepositoryInterface
     */
    private $walletRepository;

    /**
     * UsuarioService constructor.
     *
     * @param \App\Repositories\Users\UserRepositoryInterface $userRepository
     * @param \App\Repositories\Users\Wallets\WalletRepositoryInterface $walletRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        WalletRepositoryInterface $walletRepository)
    {
        $this->userRepository = $userRepository;
        $this->walletRepository = $walletRepository;
    }

    /**
     * @inheritDoc
     */
    public function register($dados): User
    {

        $dados['wallet']['money'] = 0;

        $walletId = $this->walletRepository->create( $dados['wallet']);

        $insertedId = $walletId->id;

        $dados['wallet_id'] = $insertedId;

        $dados['type'] = ($dados['type'] == 'logista' ? UserRepositoryInterface::LOGISTA : UserRepositoryInterface::COMUM);


        unset($dados['wallet']);

        $user = $this->userRepository->create($dados);

        return $user;

    }

    /**
     * @inheritDoc
     */
    public function list(): array
    {
        return $this->userRepository->list();
    }

}
