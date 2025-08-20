<?php

namespace Src\Agenda\User\Domain\Model\ValueObjects;

use Src\Common\Domain\ValueObject;
use Exception;

final class Password extends ValueObject
{
    public readonly ?string $value;

    public function __construct(?string $password, ?string $confirmation)
    {
        if ($password && strlen($password) < 8) {
            throw new Exception("Password too short");
        }

        if ($password !== $confirmation) {
            throw new Exception("Password do not match confirmation");
        }

        $this->value = $password;
    }

    public static function fromString(string $password, string $confirmation): self
    {
        return new self($password, $confirmation);
    }

    public function isNotEmpty(): bool
    {
        return $this->value !== null;
    }

    public function jsonSerialize(): string
    {
        return '';
    }
}