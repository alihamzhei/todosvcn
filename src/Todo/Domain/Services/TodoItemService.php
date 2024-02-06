<?php

namespace Src\Todo\Domain\Services;

use Illuminate\Support\Collection;
use Src\Todo\Application\DTOs\TodoItemDTO;
use Src\Todo\Domain\ValueObjects\TodoItem\TodoItemID;
use Src\Todo\Infrastructure\Models\TodoItem;
use Src\Todo\Infrastructure\Repositories\TodoItemRepositoryInterface;
use Src\Todo\Infrastructure\Services\TodoItemServiceInterface;

class TodoItemService implements TodoItemServiceInterface
{

    public function __construct(private TodoItemRepositoryInterface $todoItemRepository)
    {
    }

    public function all(): Collection
    {
        return $this->todoItemRepository->all();
    }

    /**
     * show
     *
     * @param TodoItemID $todoItemID
     * @return TodoItem|null
     */
    public function show(TodoItemID $todoItemID): ?TodoItem
    {
        return $this->todoItemRepository->find($todoItemID->todoID);
    }

    /**
     * store
     *
     * @param TodoItemDTO $todoItemDTO
     * @return TodoItem|null
     */
    public function store(TodoItemDTO $todoItemDTO): ?TodoItem
    {
        return $this->todoItemRepository->create([
            'title' => $todoItemDTO->title,
            'description' => $todoItemDTO->text,
            'priority' => $todoItemDTO->priority,
            'todo_id' => $todoItemDTO->todo_id,
        ]);
    }

    /**
     * update
     *
     * @param TodoItemID $todoItemID
     * @param TodoItemDTO $todoItemDTO
     * @return TodoItem|null
     */
    public function update(TodoItemID $todoItemID, TodoItemDTO $todoItemDTO): ?TodoItem
    {
        return $this->todoItemRepository->update([
            'title' => $todoItemDTO->title,
            'description' => $todoItemDTO->text,
            'priority' => $todoItemDTO->priority,
        ], $todoItemID->todoID);
    }

    /**
     * delete
     *
     * @param TodoItemID $todoItemID
     * @return bool
     */
    public function delete(TodoItemID $todoItemID): bool
    {
        return $this->todoItemRepository->delete($todoItemID->todoID);
    }
}
