<?php

namespace Src\Agenda\User\Domain\Repositories;

use Src\Agenda\User\Domain\Model\User;

interface UserRepositoryInterface
{
    public function findAll(): array;

    public function findById(?int $id): User;

    public function findByEmail(string $email): User;

    
}