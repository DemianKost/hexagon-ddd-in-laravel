<?php

namespace Src\Agenda\User\Infastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Src\Agenda\User\Domain\Model\User;
use Src\Agenda\User\Infastructure\EloquentModels\Casts\PasswordCast;

class UserEloquentModel extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'password' => PasswordCast::class,
    ];
}