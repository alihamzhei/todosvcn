<?php

namespace Src\Todo\Domain\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Src\Common\Domain\Repositories\BaseRepository;
use Src\Todo\Domain\ValueObjects\TodoList\TodoListID;
use Src\Todo\Infrastructure\Models\TodoItem;
use Src\Todo\Infrastructure\Repositories\TodoItemRepositoryInterface;

class TodoItemRepository extends BaseRepository implements TodoItemRepositoryInterface
{
    protected function model(): string
    {
        return TodoItem::class;
    }

    public function findTodoItemsByTodoID(TodoListID $todoListID): Collection
    {
        $query = $this->model->newQuery();

        return $query
            ->where('todo_id', $todoListID->todoID)
            ->orderBy('priority', 'DESC')
            ->get();
    }
}
