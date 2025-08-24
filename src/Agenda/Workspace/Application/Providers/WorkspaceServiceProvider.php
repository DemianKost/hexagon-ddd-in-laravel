<?php

namespace Src\Agenda\Workspace\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Src\Agenda\Workspace\Application\Repositories\Eloquent\WorkspaceRepository;
use Src\Agenda\Workspace\Domain\Repositories\WorkspaceRepistoryInterface;

class WorkspaceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            WorkspaceRepistoryInterface::class,
            WorkspaceRepository::class,
        );
    }

    public function boot()
    {
        Route::middleware('web')
            ->prefix('workspace')
            ->name('workspace.')
            ->group(base_path('src/Agenda/Workspace/Presentation/HTTP/routes.php'));
    }
}