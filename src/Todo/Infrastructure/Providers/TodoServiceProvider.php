<?php

namespace Src\Todo\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Todo\Domain\Repositories\TodoItemRepository;
use Src\Todo\Domain\Repositories\TodoListRepository;
use Src\Todo\Domain\Services\TodoListService;
use Src\Todo\Infrastructure\Models\TodoItem;
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
        $this->app->bind(TodoItemServiceInterface::class, TodoItem::class);
        $this->app->bind(TodoListServiceInterface::class, TodoListService::class);

        $this->app->bind(TodoListRepositoryInterface::class, TodoListRepository::class);
        $this->app->bind(TodoItemRepositoryInterface::class, TodoItemRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
