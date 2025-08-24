<?php

namespace Src\Agenda\Workspace\Application\Repositories\Eloquent;

use Src\Agenda\Workspace\Domain\Model\Workspace;
use Src\Agenda\Workspace\Application\Mappers\WorkspaceMapper;
use Src\Agenda\Workspace\Domain\Repositories\WorkspaceRepistoryInterface;
use Src\Agenda\Workspace\Infastructure\EloquentModels\WorkspaceEloquentModel;

class WorkspaceRepository implements WorkspaceRepistoryInterface
{
    public function findAll(): array
    {
        $workspaces = [];
        foreach ( WorkspaceEloquentModel::all() as $workspaceEloquent ) {
            $workspaces[] = WorkspaceMapper::fromEloquent($workspaceEloquent);
        }
        return $workspaces;
    }

    public function findById(string $id): Workspace
    {
        $workspaceEloquent = WorkspaceEloquentModel::query()->findOr($id);
        return WorkspaceMapper::fromEloquent($workspaceEloquent);
    }

    public function create(Workspace $workspace): Workspace
    {
        WorkspaceEloquentModel::create($workspace->toArray());
        return $workspace;
    }

    public function update(Workspace $workspace): void
    {
        $workspaceEloquent = WorkspaceEloquentModel::query()->findOrFail($workspace->id);
        $workspaceEloquent->update($workspace->toArray());
    }

    public function delete(string $id): void
    {
        $workspaceEloquent = WorkspaceEloquentModel::query()->findOrFail($id);
        $workspaceEloquent->delete();
    }
}