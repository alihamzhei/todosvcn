<?php

namespace Src\Todo\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Src\Todo\Domain\ValueObjects\TodoList\TodoListID;

interface TodoItemRepositoryInterface
{
    public function findTodoItemsByTodoID(TodoListID $todoListID): Collection;
}
