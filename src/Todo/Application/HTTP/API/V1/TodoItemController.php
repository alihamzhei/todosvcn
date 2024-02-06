<?php

namespace Src\Todo\Application\HTTP\API\V1;

use Illuminate\Http\JsonResponse;
use Src\Common\Infrastructure\Controllers\Controller;
use Src\Todo\Application\Requests\API\V1\StoreTodoItemRequest;
use Src\Todo\Application\Requests\API\V1\UpdateTodoItemRequest;
use Src\Todo\Infrastructure\Models\TodoItem;

class TodoItemController extends Controller
{
    public function index(): JsonResponse
    {

    }

    public function show(TodoItem $todoItem): JsonResponse
    {

    }

    public function store(StoreTodoItemRequest $todoItemRequest): JsonResponse
    {

    }

    public function update(TodoItem $todoItem, UpdateTodoItemRequest $todoItemRequest): JsonResponse
    {

    }

    public function delete(TodoItem $todoItem): JsonResponse
    {

    }
}
