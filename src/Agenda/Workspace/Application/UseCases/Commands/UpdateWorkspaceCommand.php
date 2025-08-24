<?php

namespace Src\Agenda\Workspace\Application\UseCases\Commands;

use Src\Agenda\Workspace\Domain\Model\Workspace;
use Src\Agenda\Workspace\Domain\Repositories\WorkspaceRepistoryInterface;
use Src\Common\Domain\CommandInterface;

class UpdateWorkspaceCommand implements CommandInterface
{
    private WorkspaceRepistoryInterface $repository;

    public function __construct(
        private Workspace $workspace,
    ) {
        $this->repository = app()->make(WorkspaceRepistoryInterface::class);
    }

    public function execute()
    {
        $this->repository->update($this->workspace);
    }
}