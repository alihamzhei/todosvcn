<?php

namespace Src\Todo\Infrastructure\Services;

use Illuminate\Support\Collection;
use Src\Todo\Application\DTOs\TodoItemDTO;
use Src\Todo\Domain\ValueObjects\TodoList\TodoListID;
use Src\Todo\Infrastructure\Models\TodoList;

interface TodoListServiceInterface
{
    public function all(): Collection;

    public function show(TodoListID $todoItemID): ?TodoList;

    public function store(TodoItemDTO $todoItemDTO): ?TodoList;

    public function update(TodoListID $todoItemID, TodoItemDTO $todoItemDTO): bool;

    public function delete(TodoListID $todoItemID): bool;
}
