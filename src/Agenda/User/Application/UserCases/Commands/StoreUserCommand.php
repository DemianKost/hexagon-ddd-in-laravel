<?php

namespace Src\Agenda\User\Application\UserCases\Commands;

use Exception;
use Src\Agenda\User\Domain\Model\User;
use Src\Agenda\User\Domain\Model\ValueObjects\Password;
use Src\Agenda\User\Domain\Policies\UserPolicy;
use Src\Agenda\User\Domain\Repositories\UserRepositoryInterface;
use Src\Common\Domain\CommandInterface;
use Src\Agenda\User\Infastructure\EloquentModels\UserEloquentModel;

class StoreUserCommand implements CommandInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(
        private readonly User $user,
        private readonly Password $password
    ) {
        $this->repository = app()->make(UserRepositoryInterface::class);
    }

    /**
     * @throws \Exception
     * @return User
     */
    public function execute(): User
    {
        authorize('store', UserPolicy::class);
        if ( UserEloquentModel::query()->where('email', $this->user->email)->exists() ) {
            throw new Exception("Email is already used");
        }

        return $this->repository->store($this->user, $this->password);
    }
}