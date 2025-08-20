<?php

namespace Src\Agenda\User\Presentation\HTTP;

use Exception;
use Illuminate\Http\JsonResponse;
use Src\Agenda\User\Application\UserCases\Queries\FindAllUsersQuery;
use Src\Agenda\User\Application\UserCases\Queries\FindByUserByIdQuery;
use Src\Common\Infrastructure\Laravel\Controller;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            return response()->json((new FindAllUsersQuery())->handle());
        } catch (Exception $e) {
            return response()->error($e->getMessage());
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            return response()->json((new FindByUserByIdQuery($id))->handle());
        } catch(Exception $e) {
            return response()->error($e->getMessage());
        }
    }
}