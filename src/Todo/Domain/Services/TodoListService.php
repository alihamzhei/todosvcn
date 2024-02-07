<?php

namespace Src\Todo\Domain\Services;

use Illuminate\Support\Collection;
use Src\Todo\Application\DTOs\TodoItemDTO;
use Src\Todo\Application\DTOs\TodoListDTO;
use Src\Todo\Domain\Repositories\TodoListRepository;
use Src\Todo\Domain\ValueObjects\TodoList\TodoListID;
use Src\Todo\Infrastructure\Models\TodoList;
use Src\Todo\Infrastructure\Services\TodoListServiceInterface;

class TodoListService implements TodoListServiceInterface
{
    public function __construct(public TodoListRepository $listRepository)
    {
    }

    public function all(): Collection
    {
        return $this->listRepository->all();
    }

    public function show(TodoListID $todoItemID): ?TodoList
    {
        return $this->listRepository->find($todoItemID->todoID);
    }

    public function store(TodoListDTO $todoListDTO): ?TodoList
    {
        return $this->listRepository->create([
            'title' => $todoListDTO->title,
            'user_id' => $todoListDTO->user_id
        ]);
    }

    public function update(TodoListID $todoListID, TodoListDTO $todoListDTO): ?TodoList
    {
        return $this->listRepository->update([
            'title' => $todoListDTO->title,
        ], $todoListID->todoID);
    }

    public function delete(TodoListID $todoListID): bool
    {
        return $this->listRepository->delete($todoListID->todoID);
    }
}
