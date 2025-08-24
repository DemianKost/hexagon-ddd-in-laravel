<?php

namespace Src\Agenda\Workspace\Application\UseCases\Commands;

use Src\Agenda\Workspace\Domain\Repositories\WorkspaceRepistoryInterface;
use Src\Common\Domain\CommandInterface;

class DeleteWorkspaceCommand implements CommandInterface
{
    private WorkspaceRepistoryInterface $repository;

    public function __construct(
        private string $id
    ) {
        $this->repository = app()->make(WorkspaceRepistoryInterface::class);
    }

    public function execute()
    {
        $this->repository->delete($this->id);
    }
}