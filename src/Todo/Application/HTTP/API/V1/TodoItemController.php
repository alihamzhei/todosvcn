<?php

namespace Src\Todo\Application\HTTP\API\V1;

use Illuminate\Http\JsonResponse;
use Src\Common\Infrastructure\Controllers\Controller;
use Src\Common\Infrastructure\Facades\Response;
use Src\Todo\Application\DTOs\TodoItemDTO;
use Src\Todo\Application\Requests\API\V1\StoreTodoItemRequest;
use Src\Todo\Application\Requests\API\V1\UpdateTodoItemRequest;
use Src\Todo\Domain\ValueObjects\TodoItem\TodoItemID;
use Src\Todo\Domain\ValueObjects\TodoList\TodoListID;
use Src\Todo\Infrastructure\Models\TodoItem;
use Src\Todo\Infrastructure\Services\TodoItemServiceInterface;

class TodoItemController extends Controller
{
    /**
     * @param TodoItemServiceInterface $todoItemService
     */
    public function __construct(public TodoItemServiceInterface $todoItemService)
    {
    }

    /**
     * @param $todo_id
     * @return JsonResponse
     */
    public function index($todo_id): JsonResponse
    {
        $todoLists = $this->todoItemService->all(new TodoListID($todo_id));

        return Response::message('todo items list found successfully')
            ->data($todoLists)
            ->send();
    }

    /**
     * show
     *
     * @param $item_id
     * @return JsonResponse
     */
    public function show($item_id): JsonResponse
    {
        $todoLists = $this->todoItemService->show(new TodoItemID($item_id));

        return Response::message('todo item found successfully')
            ->data($todoLists)
            ->send();
    }


    /**
     * store
     *
     * @param $todo_id
     * @param StoreTodoItemRequest $todoListRequest
     * @return JsonResponse
     */
    public function store($todo_id, StoreTodoItemRequest $todoListRequest): JsonResponse
    {
        $todoItemDTO = new TodoItemDTO(
            $todoListRequest->title,
            $todoListRequest->description,
            $todoListRequest->priority,
            (new TodoListID($todo_id))->todoID
        );

        $todoList = $this->todoItemService->store($todoItemDTO);

        return Response::message('todo item created successfully')
            ->data($todoList)
            ->send();
    }


    /**
     * @param $item_id
     * @param UpdateTodoItemRequest $updateTodoItemRequest
     * @return JsonResponse
     */
    public function update($item_id, UpdateTodoItemRequest $updateTodoItemRequest): JsonResponse
    {
        $todoItemDTO = new TodoItemDTO(
            $updateTodoItemRequest->title,
            $updateTodoItemRequest->description,
            $updateTodoItemRequest->priority,
        );

        $updatedTodoItem = $this->todoItemService->update(new TodoItemID($item_id), $todoItemDTO);

        return Response::message('todo item updated successfully')
            ->data($updatedTodoItem)
            ->send();
    }

    /**
     * @param $item_id
     * @return JsonResponse
     */
    public function delete($item_id): JsonResponse
    {
        $this->todoItemService->delete(new TodoItemID($item_id));

        return Response::message('todo item deleted successfully')
            ->send();
    }
}
