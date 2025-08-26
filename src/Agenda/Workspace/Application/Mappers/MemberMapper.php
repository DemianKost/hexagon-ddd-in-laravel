<?php

namespace Src\Agenda\Workspace\Application\Mappers;

use Illuminate\Http\Request;
use Src\Agenda\Workspace\Domain\Model\Entities\Member;

class MemberMapper
{
    public static function fromRequest(Request $request): Member
    {
        return new Member(
            user_id: $request->string('user_id'),
        );
    }
}