<?php

namespace Src\Todo\Application\HTTP\API\V1;

use Illuminate\Http\JsonResponse;
use Src\Common\Infrastructure\Controllers\Controller;
use Src\Common\Infrastructure\Facades\Response;
use Src\Todo\Application\DTOs\TodoListDTO;
use Src\Todo\Application\Requests\API\V1\StoreTodoListRequest;
use Src\Todo\Application\Requests\API\V1\UpdateTodoListRequest;
use Src\Todo\Domain\ValueObjects\TodoList\TodoListID;
use Src\Todo\Infrastructure\Services\TodoListServiceInterface;

class TodoListController extends Controller
{
    public function __construct(public TodoListServiceInterface $listService)
    {

    }

    public function index(): JsonResponse
    {
        $todoLists = $this->listService->all();
        return Response::message('todos list found successfully')
            ->data($todoLists)
            ->send();
    }

    /**
     * show
     *
     * @param $todo_id
     * @return JsonResponse
     */
    public function show($todo_id): JsonResponse
    {
        $todoLists = $this->listService->show(new TodoListID($todo_id));

        return Response::message('todo found successfully')
            ->data($todoLists)
            ->send();
    }

    /**
     * store
     *
     * @param StoreTodoListRequest $todoListRequest
     * @return JsonResponse
     */
    public function store(StoreTodoListRequest $todoListRequest): JsonResponse
    {
        $todoListDTO = new TodoListDTO(
            $todoListRequest->title,
            1
        );

        $todoList = $this->listService->store($todoListDTO);

        return Response::message('todo created successfully')
            ->data($todoList)
            ->send();
    }

    /**
     * update
     *
     * @param $todo_id
     * @param UpdateTodoListRequest $updateTodoListRequest
     * @return JsonResponse
     */
    public function update($todo_id, UpdateTodoListRequest $updateTodoListRequest): JsonResponse
    {
        $todoListDTO = new TodoListDTO(
            $updateTodoListRequest->title,
            1
        );

        $updatedTodo = $this->listService->update(new TodoListID($todo_id), $todoListDTO);

        return Response::message('todo updated successfully')
            ->data($updatedTodo)
            ->send();
    }

    public function delete($todo_id): JsonResponse
    {
        $this->listService->delete(new TodoListID($todo_id));

        return Response::message('todo deleted successfully')
            ->send();
    }
}
