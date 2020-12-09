<?php

namespace App\Repositories\Users;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Contracts\Users\Repositories\UserRepositoryInterface;
use App\Mappers\Transactions\TransactionMapper;
use App\Mappers\Transactions\TransactionMapperInterface;
use App\Models\Users\User;
use Illuminate\Support\Collection;

/**
 * Class UserRepository
 * @package App\Repositories\Users
 */
class UserRepository implements UserRepositoryInterface
{

    /** @var \App\Model\User $usuarioModel */
    private User $usuarioModel;

    /** @var \Illuminate\Database\Eloquent\Builder */
    private $queryBuilder;

    /** @var \App\Contracts\Users\Mappers\UserMapperInterface */
    private $userMapper;

    /**
     * UserRepository constructor.
     * @param \App\Models\Users                                 $usuarioModel
     * @param \App\Contracts\Users\Mappers\UserMapperInterface  $userMapper
     */
    public function __construct(UserMapperInterface $userMapper, User $usuarioModel)
    {
        $this->userMapper = $userMapper;
        $this->usuarioModel = $usuarioModel;
        $this->queryBuilder = $this->usuarioModel->newQuery();
    }


    /**
     * @inheritDoc
     */
    public function create(array $dados): User
    {

        $user = User::create($dados);


        if (!$user) {
            throw new \Exception();
        }

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function list(): array
    {

        $users = User::all();

        return $users->toArray();
    }

}
