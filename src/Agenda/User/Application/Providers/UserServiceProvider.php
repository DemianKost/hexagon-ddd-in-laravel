<?php

namespace Src\Agenda\User\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Src\Agenda\User\Application\Repositories\Eloquent\UserRepository;
use Src\Agenda\User\Domain\Repositories\UserRepositoryInterface;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
    }

    public function boot()
    {
        Route::middleware('web')
            ->prefix('user')
            ->name('user.')
            ->group(base_path('src/Agenda/User/Presentation/HTTP/routes.php'));
    }
}