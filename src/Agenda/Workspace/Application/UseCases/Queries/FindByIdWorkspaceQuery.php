<?php

namespace Src\Agenda\Workspace\Application\UseCases\Queries;

use Src\Common\Domain\QueryInterface;
use Src\Agenda\Workspace\Domain\Repositories\WorkspaceRepistoryInterface;

class FindByIdWorkspaceQuery implements QueryInterface
{
    private WorkspaceRepistoryInterface $repository;

    public function __construct(
        private readonly string $id,
    ) {
        $this->repository = app()->make(WorkspaceRepistoryInterface::class);
    }

    public function handle()
    {
        return $this->repository->findById($this->id);
    }
}