<?php

namespace Src\Agenda\Workspace\Domain\Model;

use Src\Common\Domain\AggregateRoot;

class Workspace extends AggregateRoot
{
    public function __construct(
        public ?int $id = 0,
        public readonly string $name,
        public readonly int $user_id,
        public readonly bool $is_active = true
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'is_active' => $this->is_active,
        ];
    }
}