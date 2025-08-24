<?php

namespace Src\Agenda\User\Infastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Src\Agenda\User\Infastructure\EloquentModels\Casts\PasswordCast;
use Src\Agenda\Workspace\Infastructure\EloquentModels\WorkspaceEloquentModel;

class UserEloquentModel extends Authenticatable
{
    use Notifiable;
    use HasFactory;

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

    /**
     * @return HasMany<WorkspaceEloquentModel, UserEloquentModel>
     */
    public function workspaces(): HasMany
    {
        return $this->hasMany(
            related: WorkspaceEloquentModel::class,
            foreignKey: 'user_id',
        );
    }
}