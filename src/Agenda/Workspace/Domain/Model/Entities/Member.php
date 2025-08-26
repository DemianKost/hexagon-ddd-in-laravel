<?php

namespace Src\Agenda\Workspace\Domain\Model\Entities;

use Src\Common\Domain\Entity;

class Member extends Entity
{
    public function __construct(
        public readonly string $user_id = null,
    ) {}

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id
        ];
    }
}