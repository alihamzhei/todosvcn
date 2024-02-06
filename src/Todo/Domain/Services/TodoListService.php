<?php

namespace Src\Todo\Domain\Services;

use Illuminate\Support\Collection;
use Src\Todo\Application\DTOs\TodoItemDTO;
use Src\Todo\Domain\ValueObjects\TodoList\TodoListID;
use Src\Todo\Infrastructure\Models\TodoList;
use Src\Todo\Infrastructure\Services\TodoListServiceInterface;

class TodoListService implements TodoListServiceInterface
{
    public function all(): Collection
    {
    }

    public function show(TodoListID $todoItemID): ?TodoList
    {
    }

    public function store(TodoItemDTO $todoItemDTO): ?TodoList
    {
    }

    public function update(TodoListID $todoItemID, TodoItemDTO $todoItemDTO): bool
    {
    }

    public function delete(TodoListID $todoItemID): bool
    {
    }
}
