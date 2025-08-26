<?php

namespace Src\Agenda\Workspace\Presentation\HTTP;

use Illuminate\Http\Request;
use Src\Agenda\Workspace\Application\Mappers\MemberMapper;
use Src\Agenda\Workspace\Application\Mappers\WorkspaceMapper;
use Src\Agenda\Workspace\Application\UseCases\Commands\AddWorkspaceMemberCommand;
use Src\Agenda\Workspace\Application\UseCases\Commands\RemoveWorkspaceMemberCommand;
use Src\Agenda\Workspace\Application\UseCases\Commands\StoreWorkspaceCommand;
use Src\Agenda\Workspace\Application\UseCases\Commands\UpdateWorkspaceCommand;
use Src\Agenda\Workspace\Application\UseCases\Queries\FindAllWorkspacesQuery;
use Src\Agenda\Workspace\Application\UseCases\Queries\FindByIdWorkspaceQuery;
use Src\Common\Infrastructure\Laravel\Controller;
use Illuminate\Http\JsonResponse;
use Exception;

class WorkspaceController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $workspaces = (new FindAllWorkspacesQuery())->handle();
            return response()->json($workspaces);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        try {
            $workspace = (new FindByIdWorkspaceQuery($id))->handle();
            return response()->json($workspace);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $workspace = (new StoreWorkspaceCommand(
                WorkspaceMapper::fromRequest($request)
            ))->execute();
            return response()->json($workspace);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        try {
            (new UpdateWorkspaceCommand(
                WorkspaceMapper::fromRequest($request)
            ))->execute();
            return response()->json(['message' => 'Updated workspace']);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return void
     */
    public function addMember(Request $request, string $id): JsonResponse
    {
        try {
            (new AddWorkspaceMemberCommand(
                MemberMapper::fromRequest($request),
                $id
            ))->execute();
            return response()->json(['message' => 'Added member to workspace']);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function removeMember(Request $request, string $id): JsonResponse
    {
        try {
            (new RemoveWorkspaceMemberCommand(
                MemberMapper::fromRequest($request),
                $id
            ))->execute();
            return response()->json(['message' => 'Remove member to workspace']);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}