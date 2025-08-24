<?php

namespace Src\Agenda\Workspace\Application\UseCases\Commands;

use Src\Agenda\Workspace\Domain\Model\Workspace;
use Src\Agenda\Workspace\Domain\Policies\WorkspacePolicy;
use Src\Agenda\Workspace\Domain\Repositories\WorkspaceRepistoryInterface;
use Src\Common\Domain\CommandInterface;

class StoreWorkspaceCommand implements CommandInterface
{
    private WorkspaceRepistoryInterface $repository;

    public function __construct(
        private readonly Workspace $workspace
    ) {
        $this->repository = app()->make(WorkspaceRepistoryInterface::class);
    }

    public function execute(): Workspace
    {
        authorize('create', WorkspacePolicy::class);

        return $this->repository->create($this->workspace);
    }
}