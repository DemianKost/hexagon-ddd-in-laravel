<?php

namespace Src\Agenda\User\Presentation\HTTP;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\User\Application\UserCases\Commands\StoreUserCommand;
use Src\Agenda\User\Application\UserCases\Commands\UpdateUserCommand;
use Src\Agenda\User\Application\UserCases\Queries\FindAllUsersQuery;
use Src\Agenda\User\Application\UserCases\Queries\FindByUserByIdQuery;
use Src\Agenda\User\Domain\Model\ValueObjects\Password;
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

    public function store(Request $request): JsonResponse
    {
        try {
            $userData = UserMapper::fromRequest($request);
            $password = new Password(
                $request->input('password'),
                $request->input('password_confirmation')
            );
            $user = (new StoreUserCommand(
                $userData,
                $password
            ))->execute();
            return response()->json($user->toArray(), Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $userData = UserMapper::fromRequest($request);
            $password = new Password(
                $request->input('password'),
                $request->input('password_confirmation')
            );
            (new UpdateUserCommand(
                $userData,
                $password
            ))->execute();
             return response()->json([], Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}