<?php

namespace Src\Agenda\Workspace\Domain\Model;

use Src\Common\Domain\AggregateRoot;

class Workspace extends AggregateRoot
{
    public function __construct(
        public readonly string $id = null,
        public readonly string $name,
        public readonly bool $is_active = true
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_active' => $this->is_active,
        ];
    }
}