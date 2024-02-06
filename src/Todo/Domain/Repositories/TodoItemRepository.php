<?php

namespace Src\Todo\Domain\Repositories;

use Src\Common\Domain\Repositories\BaseRepository;
use Src\Todo\Infrastructure\Models\TodoItem;
use Src\Todo\Infrastructure\Models\TodoList;
use Src\Todo\Infrastructure\Repositories\TodoListRepositoryInterface;

class TodoItemRepository extends BaseRepository implements TodoListRepositoryInterface
{
    protected function model(): string
    {
        return TodoItem::class;
    }
}
