<?php

namespace Src\Agenda\Workspace\Application\Mappers;

use Illuminate\Http\Request;
use Src\Agenda\Workspace\Domain\Model\Workspace;
use Src\Agenda\Workspace\Infastructure\EloquentModels\WorkspaceEloquentModel;

class WorkspaceMapper
{
    public static function fromRequest(Request $request): Workspace
    {
        return new Workspace(
            id: null,
            name: $request->string('name'),
            user_id: auth()->id(),
            is_active: $request->boolean('is_active', true),
        );
    }

    public static function fromEloquent(WorkspaceEloquentModel $workspaceEloquent): Workspace
    {
        return new Workspace(
            id: $workspaceEloquent->id,
            name: $workspaceEloquent->name,
            user_id: $workspaceEloquent->user_id,
            is_active: $workspaceEloquent->is_active
        );
    }
}