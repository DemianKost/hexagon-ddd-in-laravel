<?php

namespace Src\Agenda\User\Application\UserCases\Commands;

use Src\Agenda\User\Domain\Model\User;
use Src\Agenda\User\Domain\Model\ValueObjects\Password;
use Src\Agenda\User\Domain\Policies\UserPolicy;
use Src\Agenda\User\Domain\Repositories\UserRepositoryInterface;
use Src\Common\Domain\CommandInterface;

class UpdateUserCommand implements CommandInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(
        private readonly User $user,
        private readonly Password $password,
    ) {
        $this->repository = app()->make(UserRepositoryInterface::class);
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        authorize('update', UserPolicy::class, ['user' => $this->user]);
        
        return $this->repository->update($this->user, $this->password);
    }
}