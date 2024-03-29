<?php

namespace Src\Todo\Domain\ValueObjects\TodoList;

use Src\Todo\Infrastructure\Repositories\TodoListRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TodoListID
{
    public function __construct(public int $todoID)
    {
        $todoRepo = app(TodoListRepositoryInterface::class);

        if (!$todoRepo->find($todoID)) {
            throw new NotFoundHttpException();
        };
    }
}
