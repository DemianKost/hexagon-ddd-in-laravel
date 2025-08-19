<?php

namespace Src\Agenda\User\Domain\Model;

use Src\Common\Domain\AggregateRoot;

class User extends AggregateRoot
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly bool $is_admin = false
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => $this->is_admin,
        ];
    }
}