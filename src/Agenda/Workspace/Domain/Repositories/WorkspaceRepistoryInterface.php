<?php

namespace Src\Agenda\Workspace\Domain\Repositories;

use Src\Agenda\Workspace\Domain\Model\Entities\Member;
use Src\Agenda\Workspace\Domain\Model\Workspace;

interface WorkspaceRepistoryInterface
{
    public function findAll(): array;

    public function findById(string $id): Workspace;

    public function create(Workspace $workspace): Workspace;

    public function update(Workspace $workspace): void;

    public function delete(string $id): void;

    public function addMember(Member $member, string $id): void;

    public function removeMember(Member $member, string $id): void;
}