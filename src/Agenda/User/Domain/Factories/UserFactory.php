<?php

namespace Src\Agenda\User\Domain\Factories;

use Src\Agenda\User\Domain\Model\User;

class UserFactory
{
    public static function new(array $attributes = null): User
    {
        $attributes = $attributes ?: [];

        $defaults = [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'is_admin' => false,
        ];

        $attributes = array_replace($defaults, $attributes);

        return new User(
            id: null,
            name: $attributes['name'],
            email: $attributes['email'],
            is_admin: $attributes['is_admin']
        );
    }
}