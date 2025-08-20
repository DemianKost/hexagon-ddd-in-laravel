<?php

namespace Src\Agenda\User\Application\UserCases\Queries;

use Src\Agenda\User\Domain\Model\User;
use Src\Agenda\User\Domain\Policies\UserPolicy;
use Src\Agenda\User\Domain\Repositories\UserRepositoryInterface;
use Src\Common\Domain\QueryInterface;

class FindByUserByIdQuery implements QueryInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(
        private readonly string $id
    ) {
        $this->repository = app()->make(UserRepositoryInterface::class);
    }

    /**
     * @return User
     */
    public function handle(): User
    {
        authorize('findById', UserPolicy::class);

        return $this->repository->findById($this->id);
    }
}