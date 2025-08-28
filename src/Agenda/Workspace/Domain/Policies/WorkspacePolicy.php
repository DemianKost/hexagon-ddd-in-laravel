<?php

namespace Src\Agenda\Workspace\Domain\Policies;

class WorkspacePolicy
{
    public static function create(): bool
    {
        return true;
    }

    public static function view(): bool
    {
        return true;
    }

    public static function update(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public static function delete(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }
}