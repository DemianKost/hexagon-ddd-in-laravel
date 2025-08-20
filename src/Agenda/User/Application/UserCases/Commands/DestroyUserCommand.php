<?php

namespace Src\Agenda\User\Application\UserCases\Commands;

use Src\Agenda\User\Domain\Policies\UserPolicy;
use Src\Agenda\User\Domain\Repositories\UserRepositoryInterface;
use Src\Common\Domain\CommandInterface;

class DestroyUserCommand implements CommandInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(
        private readonly int $id,
    ) {
        $this->repository = app()->make(UserRepositoryInterface::class);
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        authorize('delete', UserPolicy::class);

        $this->repository->delete($this->id);
    }
}