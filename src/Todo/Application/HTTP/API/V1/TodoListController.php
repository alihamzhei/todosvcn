<?php

namespace Src\Todo\Application\HTTP\API\V1;

use Illuminate\Http\JsonResponse;
use Src\Common\Infrastructure\Controllers\Controller;
use Src\Todo\Application\Requests\API\V1\StoreTodoListRequest;
use Src\Todo\Application\Requests\API\V1\UpdateTodoItemRequest;
use Src\Todo\Infrastructure\Models\TodoList;

class TodoListController extends Controller
{
    public function index(): JsonResponse
    {

    }

    public function show(TodoList $todoList): JsonResponse
    {

    }

    public function store(StoreTodoListRequest $todoItemRequest): JsonResponse
    {

    }

    public function update(TodoList $todoList, UpdateTodoItemRequest $todoItemRequest): JsonResponse
    {

    }

    public function delete(TodoList $todoList): JsonResponse
    {

    }
}
