<?php

namespace Src\Agenda\User\Application\Mappers;

use Illuminate\Http\Request;
use Src\Agenda\User\Domain\Model\User;
use Src\Agenda\User\Infastructure\EloquentModels\UserEloquentModel;

class UserMapper
{
    public static function fromRequest(Request $request, ?int $user_id = null): User
    {
        return new User(
            id: $user_id,
            name: $request->string('name'),
            email: $request->string('email'),
            is_admin: $request->boolean('is_admin', false),
        );
    }

    public static function fromEloquent(UserEloquentModel $userEloquent): User
    {
        return new User(
            id: $userEloquent->id,
            name: $userEloquent->name,
            email: $userEloquent->email,
            is_admin: $userEloquent->is_admin
        );
    }

    public static function toEloquent(User $user): UserEloquentModel
    {
        $userEloquent = new UserEloquentModel();
        if ($user->id) {
            $userEloquent = UserEloquentModel::query()->findOrFail($user->id);
        }
        $userEloquent->name = $user->name;
        $userEloquent->email = $user->email;
        $userEloquent->is_admin = $user->is_admin;

        return $userEloquent;
    }
}