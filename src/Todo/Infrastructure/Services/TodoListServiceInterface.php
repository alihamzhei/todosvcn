<?php

namespace Src\Todo\Infrastructure\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Src\Todo\Application\DTOs\TodoListDTO;
use Src\Todo\Domain\ValueObjects\TodoList\TodoListID;
use Src\Todo\Infrastructure\Models\TodoList;

interface TodoListServiceInterface
{
    public function all(): LengthAwarePaginator;

    public function show(TodoListID $todoItemID): ?TodoList;

    public function store(TodoListDTO $todoListDTO): ?TodoList;

    public function update(TodoListID $todoListID, TodoListDTO $todoListDTO): ?TodoList;

    public function delete(TodoListID $todoListID): bool;
}
