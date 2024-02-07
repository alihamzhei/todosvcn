<?php

namespace Src\Todo\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Todo\Domain\Repositories\TodoItemRepository;
use Src\Todo\Domain\Repositories\TodoListRepository;
use Src\Todo\Domain\Services\TodoItemService;
use Src\Todo\Domain\Services\TodoListService;
use Src\Todo\Infrastructure\Repositories\TodoItemRepositoryInterface;
use Src\Todo\Infrastructure\Repositories\TodoListRepositoryInterface;
use Src\Todo\Infrastructure\Services\TodoItemServiceInterface;
use Src\Todo\Infrastructure\Services\TodoListServiceInterface;

class TodoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TodoItemServiceInterface::class, TodoItemService::class);
        $this->app->bind(TodoListServiceInterface::class, TodoListService::class);

        $this->app->bind(TodoListRepositoryInterface::class, TodoListRepository::class);
        $this->app->bind(TodoItemRepositoryInterface::class, TodoItemRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(base_path('src/Todo/Infrastructure/Database/Migrations'));
        $this->loadRoutesFrom(base_path('src/Todo/Presentation/API/V1/api.php'));

//        Route::model('todoList', TodoList::class);

    }
}
