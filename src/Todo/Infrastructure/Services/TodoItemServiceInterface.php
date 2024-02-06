<?php

namespace Src\Todo\Infrastructure\Services;

use Illuminate\Support\Collection;
use Src\Todo\Application\DTOs\TodoItemDTO;
use Src\Todo\Domain\ValueObjects\TodoItem\TodoItemID;
use Src\Todo\Infrastructure\Models\TodoItem;

interface TodoItemServiceInterface
{
    public function all(): Collection;

    public function show(TodoItemID $todoItemID): ?TodoItem;

    public function store(TodoItemDTO $todoItemDTO): ?TodoItem;

    public function update(TodoItemID $todoItemID, TodoItemDTO $todoItemDTO): ?TodoItem;

    public function delete(TodoItemID $todoItemID): bool;
}
