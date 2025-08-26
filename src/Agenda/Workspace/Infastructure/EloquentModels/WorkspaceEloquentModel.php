<?php

namespace Src\Agenda\Workspace\Infastructure\EloquentModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Agenda\User\Infastructure\EloquentModels\UserEloquentModel;

class WorkspaceEloquentModel extends Model
{
    protected $table = 'workspaces';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'is_active',
        'user_id',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'user_id' => auth()->user()->id,
    ];

    /**
     * @return BelongsTo<UserEloquentModel, WorkspaceEloquentModel>
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: UserEloquentModel::class,
            foreignKey: 'user_id',
        );
    }

    /**
     * @return BelongsToMany<UserEloquentModel, WorkspaceEloquentModel, \Illuminate\Database\Eloquent\Relations\Pivot>
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(
            related: UserEloquentModel::class,
            foreignPivotKey: 'user_id'
        );
    }
}