<?php

namespace Src\Agenda\Workspace\Application\UseCases\Commands;

use Src\Agenda\Workspace\Domain\Model\Entities\Member;
use Src\Agenda\Workspace\Domain\Repositories\WorkspaceRepistoryInterface;
use Src\Common\Domain\CommandInterface;

class RemoveWorkspaceMemberCommand implements CommandInterface
{
    private WorkspaceRepistoryInterface $repository;

    public function __construct(
        private readonly Member $member,
        private readonly string $id
    ) {
        $this->repository = app()->make(WorkspaceRepistoryInterface::class);
    }

    public function execute()
    {
        $this->repository->removeMember($this->member, $this->id);
    }
}