<?php

namespace Src\Agenda\Workspace\Application\UseCases\Queries;

use Src\Agenda\Workspace\Domain\Repositories\WorkspaceRepistoryInterface;
use Src\Common\Domain\QueryInterface;

class FindAllWorkspacesQuery implements QueryInterface
{
    private WorkspaceRepistoryInterface $repository;

    public function __construct()
    {
        $this->repository = app()->make(WorkspaceRepistoryInterface::class);
    }

    public function handle(): array
    {
        return $this->repository->findAll();
    }
}